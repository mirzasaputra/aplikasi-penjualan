<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Distributor;
use Vinkla\Hashids\Facades\Hashids;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'      => 'Data Distributor',
            'mod'        => 'mod_distributor',
            'collection' => Distributor::all(),
        ];

        return view('admin.'. $this->defaultLayout('distributor.index'), $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'      => 'Tambah Data Distributor',
            'mod'        => 'mod_distributor',
            'action'     => route('distributor.store'),
        ];

        return view('admin.'. $this->defaultLayout('distributor.form'), $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'no_telp' => 'required'
        ]);

        try {
            Distributor::create($request->only('name', 'no_telp', 'alamat'));

            return response()->json([
                'messages' => 'Data telah ditambahkan',
                'redirect' => route('distributor'),
            ]);
        } catch(Exception $e){
            return response()->json([
                'messages' => 'Terjadi kesalahan'
            ], 500);
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
            'title' => 'Edit Data Distributor',
            'mod'   => 'mod_distributor',
            'data'  => Distributor::find($ids[0]),
            'action' => route('distributor.update', $id)
        ];

        return view('admin.'. $this->defaultLayout('distributor.form'), $data);
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
        $request->validate([
            'name' => 'required',
            'no_telp' => 'required'
        ]);

        try {
            $ids = Hashids::decode($id);
            Distributor::where('id', $ids[0])->update($request->only('name', 'no_telp', 'alamat'));

            return response()->json([
                'messages' => 'Data telah diupdate',
                'redirect' => route('distributor')
            ]);
        } catch(Exception $e){
            return response()->json([
                'messages' => 'Terjadi kesalahan',
            ], 500);
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
                Distributor::findOrFail($ids[0])->delete();

                return response()->json([
                    'messages' => 'Data Barang telah diupdate',
                    'redirect' => route('distributor')
                ], 200);
            } catch(Exception $e){
                return response()->json([
                    'messages' => 'Opps! terjadi kesalahan'
                ], 500);
            }
        }
    }
}
