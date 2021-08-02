@extends('admin.layouts.ajax')
@section('content')

<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">{{ $title }}</h3>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <div class="col-md-6 col-sm-8 col-xs-12 col-12">
            <div class="card shadow-sm border">
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-5">
                                <label for="">Tanggal Awal</label>
                            </div>
                            <div class="col-md-9 col-sm-7">
                                <input type="date" name="tgl_awal" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-5">
                                <label for="">Tanggal Akhir</label>
                            </div>
                            <div class="col-md-9 col-sm-7">
                                <input type="date" name="tgl_akhir" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-5">
                            </div>
                            <div class="col-md-9 col-sm-7">
                                <a href="" target="blank" id="link" class="btn btn-primary"><em class="icon ni ni-print"></em> Cetak</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="card card-bordered card-preview">
            <div class="card-inner-group">
                <div class="card-inner position-relative card-tools-toggle">
                    <div class="card-title-group">
                        <div class="card-tools">
                            <form action="">
                                <div class="form-inline flex-nowrap gx-3">
                                    <label for="">Tanggal Awal</label>
                                    <div class="form-wrap">
                                        <input type="date" name="tgl_awal" class="form-control">
                                    </div>
                                    <label for="">Tanggal Akhir</label>
                                    <div class="form-wrap">
                                        <input type="date" name="tgl_khir" class="form-control">
                                    </div>
                                    <div class="btn-wrap">
                                        <span class="d-none d-md-block"><button class="btn btn-dim btn-outline-light disabled">Apply</button></span>
                                        <span class="d-md-none"><button class="btn btn-dim btn-outline-light btn-icon disabled"><em class="icon ni ni-arrow-right"></em></button></span>
                                    </div>
                                </div><!-- .form-inline -->
                            </form>
                        </div><!-- .card-tools -->
                    </div><!-- .card-title-group -->
                </div><!-- .card-inner -->
                <div class="card-inner p-4">
                    <div class="table-responsive">
                        <table class="table-bordered nk-tb-list nk-tb-ulist" data-auto-responsive="false" id="">
                            <thead class="nk-tb-head bg-light-table">
                                <tr class="nk-tb-item ">
                                    <th class="nk-tb-col"><span class="sub-text">No. Invoice</span></th>
                                    <th class="nk-tb-col tb-col-mb"><span class="sub-text">Total</span></th>
                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Bayar</span></th>
                                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Kembali</span></th>
                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Diskon</span></th>
                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Tanggal</span></th>
                                </tr>
                            </thead><!-- .nk-tb-item -->
                            <tbody>
                                {{-- @foreach ($penjualan as $item)
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col">
                                        <span>{{ $item->invoice }}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{ $item->total }}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-lg">
                                        <span>Rp. {{ number_format($item->bayar, 0, ',', '.') }}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-lg">
                                        <span>Rp. {{ number_format($item->kembali, 0, ',', '.') }}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{ $item->diskon }}% / Rp. {{ number_format($item->total / 100 * $item->diskon, 0, ',', '.') }}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        @php
                                            $date = date_create($item->tgl);
                                        @endphp
                                        <span>{{ date_format($date, 'D, d M Y') }}</span>
                                    </td>
                                    <td class="nk-tb-col nk-tb-col-tools">
                                        @can('read-daftar-penjualan')      
                                            <ul class="nk-tb-actions gx-1">
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                @can('read-daftar-penjualan') 
                                                                    <li><a class="ajaxAction" href="/administrator/daftar-penjualan/{{ Hashids::encode($item->id).'/detail' }}"><em class="icon ni ni-edit"></em><span>Detail Penjualan</span></a></li>
                                                                @endcan
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        @endcan
                                    </td>
                                </tr><!-- .nk-tb-item -->
                                @endforeach --}}
                            {{-- </tbody>
                        </table><!-- .nk-tb-list -->
                    </div>
                </div><!-- .card-inner -->
            </div>
        </div>--}}
    </div><!-- .nk-block -->
</div>

@endsection
