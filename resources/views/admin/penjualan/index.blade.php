@extends('admin.layouts.ajax')
@section('content')

<div class="nk-content-body">
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="float-right">No. Invoice {{ session('invoice') }}</h5>
                    <h5>Total</h5>
                    <hr>
                    <h2 class="float-right text-muted">{{number_format(isset($total) ? $total : 0, 0, ',', '.')}}</h2>
                    <h2>Rp.</h2>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xs-12">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <form action="" id="cariBarang">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3 col-sm-5">
                                        <label for="" class="form-label">Cari Barang</label>
                                    </div>
                                    <div class="col-md-9 col-sm-7">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Input Barcode" name="barcode" autocomplete="off" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalBarang"><em class="icon ni ni-search"></em></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3 col-sm-5">
                                        <label for="" class="form-label">Qty</label>
                                    </div>
                                    <div class="col-md-9 col-sm-7">
                                        <input type="hidden" id="noInvoice" value="{{ session('invoice') }}">
                                        <input type="number" min="0" class="form-control" id="qty" value="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-sm-5">
                                    <label for="" class="form-label">Nama Barang</label>
                                </div>
                                <div class="col-md-9 col-sm-7">
                                    <input type="hidden" id="id_barang">
                                    <input type="text" class="form-control" id="namaBarang" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-sm-5">
                                    <label for="" class="form-label">Harga Barang</label>
                                </div>
                                <div class="col-md-9 col-sm-7">
                                    <input type="text" class="form-control" id="hargaBarang" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-sm-5">
                                </div>
                                <div class="col-md-9 col-sm-7">
                                    <button class="btn btn-primary" onclick="tambahBarang()" type="button"><em class="icon ni ni-cart"></em> Tambah</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5><em class="icon ni ni-list"></em> Data Barang</h5>
                </div>
                <div class="card-body">
                    <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false" id="">
                        <thead class="nk-tb-head bg-light-table">
                            <th class="nk-tb-col"><span class="sub-text">Barcode</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Name</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Harga</span></th>
                                <th class="nk-tb-col tb-col-lg"><span class="sub-text">Qty</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Subtotal</span></th>
                                <th class="nk-tb-col nk-tb-col-tools text-right"></th>
                        </thead>
                        <tbody>
                            @foreach ($penjualan_detail as $item)
                            <tr class="nk-tb-item">
                                <td class="nk-tb-col tb-col-mb">
                                    <span>{{ $item->barang->barcode }}</span>
                                </td>
                                <td class="nk-tb-col tb-col-md">
                                    <span>{{ $item->barang->nama }}</span>
                                </td>
                                <td class="nk-tb-col tb-col-lg">
                                    <span>Rp. {{ number_format($item->barang->harga_jual, 0, ',', '.') }}</span>
                                </td>
                                <td class="nk-tb-col tb-col-md">
                                    <span>{{ $item->qty }}</span>
                                </td>
                                <td class="nk-tb-col tb-col-md">
                                    <span>Rp. {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                                </td>
                                <td class="nk-tb-col nk-tb-col-tools">
                                    @can(['read-penjualan'])
                                        <a class="deleteItem text-danger nav-link" href="/administrator/penjualan/{{ Hashids::encode($item->id) }}/deleteDetail"><em class="icon ni ni-trash ni-16"></em></a>
                                    @endcan
                                </td>
                            </tr><!-- .nk-tb-item -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#modalPayment"><em class="icon ni ni-send"></em> Payment</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalBarang" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><em class="icon ni ni-list"></em> List Barang</h5>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false" id="">
                    <thead class="nk-tb-head bg-light-table">
                        <th class="nk-tb-col"><span class="sub-text">Barcode</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Name</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Harga</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-right"></th>
                    </thead>
                    <tbody>
                        @foreach ($barang as $item)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col tb-col-mb">
                                <span>{{ $item->barcode }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $item->nama }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-lg">
                                <span>Rp. {{ number_format($item->harga_jual, 0, ',', '.') }}</span>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <button class="btn btn-primary selectBarang" data-barcode="{{ $item->barcode }}" data-dismiss="modal"><em class="icon ni ni-plus"></em></button>
                            </td>
                        </tr><!-- .nk-tb-item -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalPayment" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/administrator/penjualan/payment" method="post" id="formSubmit">
                <div class="modal-header">
                    <h5 class="modal-title">Payment</h5>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-5">
                                <label class="form-label">Subtotal</label>
                            </div>
                            <div class="col-md-9 col-sm-7">
                                <div class="form-control-wrap">
                                    <input type="hidden"name="invoice" value="{{session('invoice')}}">
                                    <input type="text" class="form-control" id="subtotal" name="subtotal" placeholder="Satuan" autocomplete="off" value="{{ isset($total) ? $total : '0' }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-5">
                                <label class="form-label">Diskon</label>
                            </div>
                            <div class="col-md-9 col-sm-7">
                                <div class="form-control-wrap">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="input-group">
                                                <input type="number" min="0" max="100" class="form-control" id="diskonPersen" name="diskon" value="0">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Rp.</div>
                                                </div>
                                                <input type="text" class="form-control" id="diskonRupiah" value="0" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <i class="text-danger small d-none" id="diskonErr"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-5">
                                <label class="form-label">Total</label>
                            </div>
                            <div class="col-md-9 col-sm-7">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="total" placeholder="Satuan" autocomplete="off" value="{{ isset($total) ? $total : '0' }}" disabled>
                                    <input type="hidden" name="total" value="{{ isset($total) ? $total : '0' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-5">
                                <label class="form-label">Bayar</label>
                            </div>
                            <div class="col-md-9 col-sm-7">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="bayar" name="bayar" placeholder="Bayar" autocomplete="off" required>
                                </div>
                                <i class="text-danger small d-none" id="bayarErr"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-5">
                                <label class="form-label">Kembali</label>
                            </div>
                            <div class="col-md-9 col-sm-7">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="kembali" name="kembali" placeholder="0" autocomplete="off" disabled>
                                    <input type="hidden" name="kembali">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit"><em class="icon ni ni-send"></em> Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection