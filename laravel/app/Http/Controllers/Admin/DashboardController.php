<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Models\LastLogin;
use App\Models\Penjualan;
use App\Models\Barang;
use App\Models\User;
use DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => 'Analytics Dashboard',
            'mod'   => 'mod_dashboard',
            'lastlogin' => LastLogin::limit(5)->orderBy('id', 'DESC')->get(),
            'penjualanHariIni' => Penjualan::where('tgl', Date('Y-m-d'))->get(),
            'barang' => Barang::all(),
            'user' => User::with('roles')->whereNotIn('name', ['root'])->get(),
        ];
        return view('admin.'. $this->defaultLayout, $data);
    }

    public function getGrafikPenjualan(){
        if(\Request::ajax()){
            $data = Penjualan::select("tgl", DB::raw("SUM(total) as total"))->groupBy('tgl')->get();

            return response()->json($data);
        } else {
            abort(403);
        }
    }

}
