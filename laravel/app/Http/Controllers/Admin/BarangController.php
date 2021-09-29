<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Barang;
use App\Models\Distributor;
use Carbon\Carbon;
use Vinkla\Hashids\Facades\Hashids;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'      => 'Data Barang',
            'mod'        => 'mod_barang',
            'collection' => Barang::all()
        ];

        return view('admin.'. $this->defaultLayout, $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'  => 'Tambah Barang',
            'mod'    => 'mod_barang',
            'distributor' => Distributor::all(),
            'action' => '/administrator/barang/store',
        ];

        return view('admin.'. $this->defaultLayout('barang.form'), $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(\Request::ajax()){
            $validator = Validator::make($request->all(), [
                'kode_barang' => 'required|unique:barang,kode_barang',
                'nama'    => 'required',
                'distributor_id'    => 'required',
                'satuan'  => 'required',
                'harga_beli' => 'required|integer',
                'harga_r2' => 'required|integer',
                'harga_eceran' => 'required|integer',
                'isi_per_dus' => 'required|integer',
                'stok' => 'required|integer',
            ]);

            if($validator->fails()){
                return response()->json([
                    'messages' => $validator->messages()
                ], 400);
            } else {
                try {
                    Barang::create([
                        'kode_barang' => $request->kode_barang,
                        'nama' => $request->nama,
                        'distributor_id' => $request->distributor_id,
                        'satuan' => $request->satuan,
                        'harga_beli' => $request->harga_beli,
                        'harga_r2' => $request->harga_r2,
                        'harga_eceran' => $request->harga_eceran,
                        'isi_per_dus' => $request->isi_per_dus,
                        'stok' => $request->stok,
                    ]);

                    return response()->json([
                        'messages' => 'Data Barang telah ditambahkan',
                        'redirect' => url('/administrator/barang')
                    ], 200);
                } catch(Exception $e){
                    return response()->json([
                        'messages' => 'Opps! terjadi kesalahan'
                    ], 500);
                }
            }
        } else {
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ids = Hashids::decode($id);
        $data = [
            'title'  => 'Edit Barang',
            'mod'    => 'mod_barang',
            'distributor' => Distributor::all(),
            'action' => '/administrator/barang/'. $id .'/update',
            'data'   => Barang::find($ids[0])
        ];

        return view('admin.'. $this->defaultLayout('barang.form'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(\Request::ajax()){
            $ids = Hashids::decode($id);
            $validator = Validator::make($request->all(), [
                'kode_barang'    => 'required',
                'nama'    => 'required',
                'satuan'  => 'required',
                'harga_beli' => 'required|integer',
                'harga_r2' => 'required|integer',
                'harga_eceran' => 'required|integer',
                'isi_per_dus' => 'required|integer',
                'stok' => 'required|integer',
            ]);

            if($validator->fails()){
                return response()->json([
                    'messages' => $validator->messages()
                ], 400);
            } else {
                try {
                    Barang::where('id', $ids[0])->update([
                        'kode_barang' => $request->kode_barang,
                        'nama' => $request->nama,
                        'satuan' => $request->satuan,
                        'harga_beli' => $request->harga_beli,
                        'harga_r2' => $request->harga_r2,
                        'harga_eceran' => $request->harga_eceran,
                        'isi_per_dus' => $request->isi_per_dus,
                        'stok' => $request->stok,
                    ]);

                    return response()->json([
                        'messages' => 'Data Barang telah diupdate',
                        'redirect' => url('/administrator/barang')
                    ], 200);
                } catch(Exception $e){
                    return response()->json([
                        'messages' => 'Opps! terjadi kesalahan'
                    ], 500);
                }
            }
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(\Request::ajax()){
            $ids = Hashids::decode($id);

            try {
                Barang::findOrFail($ids[0])->delete();

                return response()->json([
                    'messages' => 'Data Barang telah diupdate',
                    'redirect' => url('/administrator/barang')
                ], 200);
            } catch(Exception $e){
                return response()->json([
                    'messages' => 'Opps! terjadi kesalahan'
                ], 500);
            }
        }
    }
}
