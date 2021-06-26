<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;

class PenjualanController extends Controller
{
    
    public function index()
    {
        if(!session()->has('invoice')){
            $getInv = Penjualan::where('tgl', date('Y-m-d'))->groupBy()->get();
    
            if($getInv->count() > 0){
                $n = 4 - \Str::length($getInv->count() + 1);
    
                if($n > 0){
                    $a = '';
                    for($i = 0;$i < $n;$i++){
                        $a .= '0';
                    }
                    $inv = 'INV-'. date('Ymd') .'-'. $a . ($getInv->count() + 1);
                } else {
                    $inv = 'INV-'. date('Ymd') .'-'. ($getInv->count() + 1);
                }
            } else {
                $inv = 'INV-'. date('Ymd') .'-0001';
            }

            session([
                'invoice' => $inv
            ]);
        }


        $penjualan = Penjualan::where('invoice', session('invoice'))->first();

        $data = [
            'title'  => 'Entry Penjualan',
            'mod'    => 'mod_penjualan',
            'barang' => Barang::all(),
            'penjualan_detail' => ($penjualan) ? PenjualanDetail::where('penjualan_id', $penjualan->id)->get() : [],
            'total'  => ($penjualan) ? PenjualanDetail::where('penjualan_id', $penjualan->id)->sum('subtotal') : 0
        ];

        return view('admin.'. $this->defaultLayout, $data);
    }

    public function findBarang(Request $request){
        if(\Request::ajax()){
            $barang = Barang::where('barcode', $request->barcode)->first();

            if($barang){
                return response()->json($barang, 200);
            } else {
                return response()->json([
                    'messages' => 'Data tidak ditemukan'
                ], 500);
            }
        } else {
            abort(403);
        }
    }

    public function tambahBarang(Request $request){
        if(\Request::ajax()){
            $penjualan = Penjualan::where('invoice', $request->invoice)->first();
            $barang = Barang::where('id', $request->id)->first();

            if($barang->stok >= $request->qty){

                if($penjualan){
                    $detail = PenjualanDetail::where('barang_id', $barang->id)->where('penjualan_id', $penjualan->id)->first();
    
                    if($detail){
                        PenjualanDetail::where('penjualan_id', $penjualan->id)->where('barang_id', $barang->id)->update([
                            'qty' => $detail->qty + $request->qty,
                            'subtotal' => $barang->harga_jual * ($detail->qty + $request->qty)
                        ]);
                    } else {
                        PenjualanDetail::create([
                            'penjualan_id' => $penjualan->id,
                            'barang_id'    => $barang->id,
                            'qty'          => $request->qty,
                            'subtotal'     => ($barang->harga_jual * $request->qty)
                        ]);
                    }

                    Barang::where('id', $barang->id)->update([
                        'stok' => ($barang->stok - $request->qty)
                    ]);
                } else {
                    $penjualan = Penjualan::create([
                        'user_id' => getInfoLogin()->id,
                        'invoice' => $request->invoice,
                        'total'   => null,
                        'bayar'   => null,
                        'kembali' => null,
                        'diskon'  => null,
                        'tgl'     => null,
                    ]);
    
                    $detail = PenjualanDetail::where('barang_id', $barang->id)->where('penjualan_id', $penjualan->id)->first();
    
                    if($detail){
                        PenjualanDetail::where('penjualan_id', $penjualan->id)->where('barang_id', $barang->id)->update([
                            'qty' => $detail->qty + $request->qty,
                            'subtotal' => $barang->harga_jual * ($detail->qty + $request->qty)
                        ]);
                    } else {
                        PenjualanDetail::create([
                            'penjualan_id' => $penjualan->id,
                            'barang_id'    => $barang->id,
                            'qty'          => $request->qty,
                            'subtotal'     => ($barang->harga_jual * $request->qty)
                        ]);
                    }

                    Barang::where('id', $barang->id)->update([
                        'stok' => ($barang->stok - $request->qty)
                    ]);
                }

                return response()->json([
                    'redirect' => '/administrator/penjualan'
                ]);
            } else {
                return response()->json([
                    'messages' => 'Stok tidak mencukupi'
                ], 500);
            }

        } else {
            abort(403);
        }
    }

    public function deleteDetail($id){
        if(\Request::ajax()){
            try{
                $ids = Hashids::decode($id);
                $data = PenjualanDetail::findOrFail($ids[0]);
                $barang = Barang::where('id', $data->barang_id)->first();

                Barang::where('id', $barang->id)->update([
                    'stok' => ($barang->stok + $data->qty)
                ]);

                $data->delete();

                return response()->json([
                    'messages' => 'Data telah dihapus',
                    'redirect' => '/administrator/penjualan'
                ], 200);
            } catch (Exception $e){
                return response()->json([
                    'messages' => 'Opps! terjadi kesalahan'
                ], 500);
            }
        }
    }

    public function payment(Request $request){
        if(\Request::ajax()){
            try{
                Penjualan::where('invoice', $request->invoice)->update([
                    'total' => $request->total,
                    'bayar' => $request->bayar,
                    'kembali' => $request->kembali,
                    'diskon' => $request->diskon,
                    'tgl' => date('Y-m-d'),
                ]);

                session()->forget('invoice');

                return response()->json([
                    'messages' => 'Transaksi berhasil',
                    'redirect' => '/administrator/penjualan'
                ]);
            } catch(Exeption $e){
                return response()->json([
                    'messages' => 'Opps! terjadi kesalahan'
                ], 500);
            }
        } else {
            abort(403);
        }
    }

    public function daftarPenjualan(){
        $data = [
            'title' => 'Daftar Penjualan',
            'mod' => 'mod_penjualan',
            'penjualan' => Penjualan::whereNotNull('bayar')->orderBy('id', 'DESC')->get()
        ];

        return view('admin.'. $this->defaultLayout('penjualan.daftar'), $data);
    }

    public function report(){
        $data = [
            'title'        => 'Report Penjualan',
            'mod'          => 'mod_penjualan'
        ];

        return view('admin.'. $this->defaultLayout('penjualan.report'), $data);
    }

}
