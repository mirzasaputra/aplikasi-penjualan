<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penjualan;
use PDF;

class ReportController extends Controller
{
    
    public function penjualan($awal, $akhir){
        $data = [
            'collection' => Penjualan::whereBetween('tgl', [$awal, $akhir])->get()
        ];

        // dd($data['collection'][1]->user);
        $pdf = PDF::loadView('admin.report.penjualan', $data);
        return $pdf->stream();
    }

    public function struk($invoice){
        $data = [
            'collection' => Penjualan::where('invoice', $invoice)->first()
        ];

        // dd($data['collection'][1]->user);
        $pdf = PDF::loadView('admin.report.struk', $data);
        return $pdf->stream();
        // return dd($data['collection']);
    }

}
