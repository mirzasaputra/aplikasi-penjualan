@extends('admin.layouts.ajax')
@section('content')

<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">{{ $title }}</h3>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li><a href="{{ url('/administrator/barang')}}" class="btn btn-light bg-white ajaxAction"><em class="icon ni ni-arrow-left"></em><span> Back</span></a></li>
                        </ul>
                    </div>
                </div><!-- .toggle-wrap -->
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <div class="card card-bordered card-stretch">
            <div class="card-inner">
                <div class="preview-block">
                    <form action="{{ url($action) }}" method="post" id="formSubmit">
                        <div class="row gy-4">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Kode Barang</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="barcode" name="kode_barang" placeholder="Kode Barang" autocomplete="off" value="{{ isset($data->kode_barang) ? $data->kode_barang : '' }}">
                                        <i class="text-danger small d-none" id="kodeBarangErr"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="default-03">Nama Barang <span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Barang" autocomplete="off" value="{{ isset($data->nama) ? $data->nama : '' }}">
                                        <i class="text-danger small d-none" id="namaErr"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="default-03">Distributor<span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <select name="distributor_id" id="" class="select2 form-control">
                                            <option value="" selected disabled>Pilih</option>
                                            @foreach($distributor as $item)
                                                <option value="{{ $item->id }}" {{ (isset($data->distributor_id) && $data->distributor_id == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <i class="text-danger small d-none" id="distributorErr"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="default-03">Satuan <span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan" autocomplete="off" value="{{ isset($data->satuan) ? $data->satuan : '' }}">
                                    </div>
                                    <i class="text-danger small d-none" id="satuanErr"></i>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="default-03">Harga Beli <span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input type="number" min="0" class="form-control" id="harga_beli" name="harga_beli" placeholder="Ex: 90000" autocomplete="off" value="{{ isset($data->harga_beli) ? $data->harga_beli : '' }}">
                                    </div>
                                    <i class="text-danger small d-none" id="harga_beliErr"></i>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="default-03">Harga Jual R2<span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input type="number" min="0" class="form-control" id="harga_jual" name="harga_r2" placeholder="Ex: 90000" autocomplete="off" value="{{ isset($data->harga_r2) ? $data->harga_r2 : '' }}">
                                    </div>
                                    <i class="text-danger small d-none" id="harga_r2Err"></i>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="default-03">Harga Jual Eceran<span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input type="number" min="0" class="form-control" id="harga_jual" name="harga_eceran" placeholder="Ex: 90000" autocomplete="off" value="{{ isset($data->harga_eceran) ? $data->harga_eceran : '' }}">
                                    </div>
                                    <i class="text-danger small d-none" id="harga_eceranErr"></i>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="default-03">Isi/Dus <span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input type="number" min="0" class="form-control" id="isi_per_dus" name="isi_per_dus" placeholder="Stok" autocomplete="off" value="{{ isset($data->isi_per_dus) ? $data->isi_per_dus : '' }}">
                                    </div>
                                    <i class="text-danger small d-none" id="isiPerDusErr"></i>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="default-03">Stok <span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input type="number" min="0" class="form-control" id="stok" name="stok" placeholder="Stok" autocomplete="off" value="{{ isset($data->stok) ? $data->stok : '' }}">
                                    </div>
                                    <i class="text-danger small d-none" id="stokErr"></i>
                                </div>
                            </div>
                        </div>
                        <hr class="preview-hr">
                        <button type="submit" class="btn btn-primary"><em class="icon ni ni-send"></em><span> Save changes </span> </button>
                    </form>
                </div>
            </div>
        </div><!-- .card -->
    </div><!-- .nk-block -->
</div>

@endsection
