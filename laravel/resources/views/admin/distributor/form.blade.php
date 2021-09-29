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
                            <li><a href="{{ url('/administrator/distributor')}}" class="btn btn-light bg-white ajaxAction"><em class="icon ni ni-arrow-left"></em><span> Back</span></a></li>
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
                        <div class="form-group">
                            <label for="">Nama Distributor <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Nama Distributor" value="{{ isset($data) ? $data->name : '' }}" autocomplete="off">
                            <i class="text-danger small d-none" id="namegErr"></i>
                        </div>
                        <div class="form-group">
                            <label for="">No. Telp/WA <span class="text-danger">*</span></label>
                            <input type="text" name="no_telp" class="form-control" placeholder="No Telp/WA" value="{{ isset($data) ? $data->no_telp : '' }}" autocomplete="off">
                            <i class="text-danger small d-none" id="noTelpErr"></i>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat" rows="3" class="form-control" placeholder="Alamat">{{ isset($data) ? $data->alamat : '' }}</textarea>
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
