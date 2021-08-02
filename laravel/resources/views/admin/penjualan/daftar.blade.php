@extends('admin.layouts.ajax')
@section('content')

<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">{{ $title }}</h3>
                <div class="nk-block-des text-soft">
                    <p>You have total {{ $penjualan->count() }} penjualan.</p>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <div class="card card-bordered card-preview">
            <div class="card-inner-group">
                <div class="card-inner position-relative card-tools-toggle">
                    <div class="card-title-group">
                        <div class="card-tools">
                            @can('delete-barang')
                                <div class="form-inline flex-nowrap gx-3">
                                    <div class="form-wrap w-150px">
                                        <select class="form-select form-select-sm" data-search="off" name="action" data-placeholder="Bulk Action">
                                            <option value="">Bulk Action</option>
                                            <option value="delete">Delete</option>
                                        </select>
                                    </div>
                                    <div class="btn-wrap">
                                        <span class="d-none d-md-block"><button class="btn btn-dim btn-outline-light disabled">Apply</button></span>
                                        <span class="d-md-none"><button class="btn btn-dim btn-outline-light btn-icon disabled"><em class="icon ni ni-arrow-right"></em></button></span>
                                    </div>
                                </div><!-- .form-inline -->
                            @endcan
                        </div><!-- .card-tools -->
                    </div><!-- .card-title-group -->
                </div><!-- .card-inner -->
                <div class="card-inner p-4">
                    <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false" id="">
                        <thead class="nk-tb-head bg-light-table">
                            <tr class="nk-tb-item ">
                                <th class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" class="custom-control-input" id="uid">
                                        <label class="custom-control-label" for="uid"></label>
                                    </div>
                                </th>
                                <th class="nk-tb-col"><span class="sub-text">No. Invoice</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Total</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Bayar</span></th>
                                <th class="nk-tb-col tb-col-lg"><span class="sub-text">Kembali</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Diskon</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Tanggal</span></th>
                                <th class="nk-tb-col nk-tb-col-tools text-right"></th>
                            </tr>
                        </thead><!-- .nk-tb-item -->
                        <tbody>
                            @foreach ($penjualan as $item)
                            <tr class="nk-tb-item">
                                <td class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" value="{{ $item->id }}" class="custom-control-input uid" id="uid{{ $loop->iteration  }}">
                                        <label class="custom-control-label" for="uid{{ $loop->iteration }}"></label>
                                    </div>
                                </td>
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
                                                                <li><a class="ajaxAction" href="{{ url('/') }}/administrator/daftar-penjualan/{{ Hashids::encode($item->id).'/detail' }}"><em class="icon ni ni-edit"></em><span>Detail Penjualan</span></a></li>
                                                            @endcan
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    @endcan
                                </td>
                            </tr><!-- .nk-tb-item -->
                            @endforeach
                        </tbody>
                    </table><!-- .nk-tb-list -->
                </div><!-- .card-inner -->
            </div>
        </div><!-- .card -->
    </div><!-- .nk-block -->
</div>

@endsection
