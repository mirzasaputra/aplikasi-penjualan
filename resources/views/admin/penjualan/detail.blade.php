@extends('admin.layouts.ajax')
@section('content')

<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">{{ $title }}</h3>
                <div class="nk-block-des text-soft">
                    <p>Detail penjualan dengan No. Invoice <b>{{ $penjualan->invoice }}</b>.</p>
                </div>
            </div><!-- .nk-block-head-content -->
            <a href="/administrator/daftar-penjualan" class="btn btn-light bg-white ajaxAction float-right"><em class="icon ni ni-arrow-left"></em><span> Back</span></a>
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <div class="card card-bordered card-preview">
            <div class="card-inner-group">
                <div class="card-inner p-4">
                    <a href="/administrator/report/{{ $penjualan->invoice }}/struk" target="_blank" class="btn btn-light bg-white float-right"><em class="icon ni ni-printer-fill"></em><span> Cetak</span></a>
                    <table>
                        <tr>
                            <td class="col-md-2 col-sm-6">No. Invoice</td>
                            <th>: {{ $penjualan->invoice }}</th>
                        </tr>
                        <tr>
                            <td class="col-md-2 col-sm-6">Kasir</td>
                            <th>: {{ $penjualan->user->name }}</th>
                        </tr>
                        <tr>
                            <td class="col-md-2 col-sm-6">Tanggal</td>
                            <th>: {{ $penjualan->tgl }}</th>
                        </tr>
                    </table>
                    <br>
                    <table class="nk-tb-list nk-tb-ulist" data-auto-responsive="false" id="">
                        <thead class="nk-tb-head bg-light-table">
                            <tr class="nk-tb-item ">
                                <th class="nk-tb-col"><span class="sub-text">Nama Barang</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Harga Barang</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Qty</span></th>
                                <th class="nk-tb-col tb-col-lg"><span class="sub-text">Subtotal</span></th>
                            </tr>
                        </thead><!-- .nk-tb-item -->
                        <tbody>
                            @php $subtotal = 0; @endphp
                            @foreach ($penjualan->penjualan_detail as $item)
                            <tr class="nk-tb-item">
                                <td class="nk-tb-col">
                                    <span>{{ $item->barang->nama }}</span>
                                </td>
                                <td class="nk-tb-col tb-col-lg">
                                    <span>Rp. {{ number_format($item->barang->harga_jual, 0, ',', '.') }}</span>
                                </td>
                                <td class="nk-tb-col">
                                    <span>{{ $item->qty }}</span>
                                </td>
                                <td class="nk-tb-col tb-col-lg">
                                    <span>Rp. {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                                </td>
                            </tr><!-- .nk-tb-item -->
                            @php $subtotal = $subtotal + $item->subtotal; @endphp
                            @endforeach
                            <tr class="nk-tb-item">
                                <td class="nk-tb-col" colspan="2"></td>
                                <td class="nk-tb-col">
                                    <span>Subtotal</span>
                                </td>
                                <td class="nk-tb-col tb-col-lg">
                                    <span>Rp. {{ number_format($subtotal, 0, ',', '.') }}</span>
                                </td>
                            </tr>
                            <tr class="nk-tb-item">
                                <td class="nk-tb-col" colspan="2"></td>
                                <td class="nk-tb-col">
                                    <span>Diskon</span>
                                </td>
                                <td class="nk-tb-col tb-col-lg">
                                    <span>Rp. {{ number_format($subtotal / 100 * $penjualan->diskon, 0, ',', '.') }}</span>
                                </td>
                            </tr>
                            <tr class="nk-tb-item">
                                <td class="nk-tb-col" colspan="2"></td>
                                <td class="nk-tb-col">
                                    <span>Total</span>
                                </td>
                                <td class="nk-tb-col tb-col-lg">
                                    <span>Rp. {{ number_format($penjualan->total, 0, ',', '.') }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table><!-- .nk-tb-list -->
                </div><!-- .card-inner -->
            </div>
        </div><!-- .card -->
    </div><!-- .nk-block -->
</div>

@endsection
