@extends('admin.layouts.ajax')
@section('content')

<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">{{ $title }}</h3>
                <div class="nk-block-des text-soft">
                    <p>Analytics Dashboard</p>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    
    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="card shadow-sm mb-3" style="border-left: 3px solid #0971fe">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 col-12">
                            <h3>{{ $penjualanHariIni->count() }}</h3>
                            <p>Data Penjualan Hari Ini</p>
                        </div>
                        <div class="col-md-4 col-12 d-none d-md-block text-muted text-center">
                            <h1><em class="icon ni ni-list"></em></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <div class="card shadow-sm mb-3" style="border-left: 3px solid #0971fe">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 col-12">
                            <h3>{{ $barang->count() }}</h3>
                            <p>Data Barang</p>
                        </div>
                        <div class="col-md-4 col-12 d-none d-md-block text-muted text-center">
                            <h1><em class="icon ni ni-briefcase"></em></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <div class="card shadow-sm mb-3" style="border-left: 3px solid #0971fe">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 col-12">
                            <h3>{{ $user->count() }}</h3>
                            <p>Data Users</p>
                        </div>
                        <div class="col-md-4 col-12 d-none d-md-block text-primary text-center">
                            <h1><em class="icon ni ni-user"></em></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="card shadow-sm mb-3">
                <div class="card-header">
                    <h5><em class="icon ni ni-user mr-3"></em> Last Login</h5>
                </div>
                <div class="card-body" style="height: 400px!important;overflow-y: auto;">
                    @foreach($lastlogin as $ll)
                        <div class="user-card border-bottom py-2">
                            <div class="user-avatar bg-primary">
                            <img src="{{ asset('admin/uploads/img/profile/user_pic.png') }}" alt="">
                            </div>
                            <div class="user-info pt-2">
                                <h6 class="m-0 p-0">{{ $ll->user->name }}</h6>
                                <span>{{ $ll->login_at }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-8 col-sm-6 col-12">
            <div class="card shadow-sm mb-3">
                <div class="card-header">
                    <h5>Grafik Penjualan</h5>
                </div>
                <div class="card-body" style="height: 400px">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection