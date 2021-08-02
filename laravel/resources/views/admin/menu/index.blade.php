@extends('admin.layouts.ajax')
@section('content')

<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">{{ $title }}</h3>
                <div class="nk-block-des text-soft">
                    <p>You have total {{ $backend_menu->count() + $frontend_menu->count()  }} menus.</p>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            @can('create-menus')
                                <li><a href="/administrator/menus/create" class="btn btn-light bg-white ajaxAction"><em class="icon ni ni-plus"></em><span>Add New Menu</span></a></li>
                            @endcan
                        </ul>
                    </div>
                </div><!-- .toggle-wrap -->
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <div class="card card-bordered card-preview">
            <div class="card-inner-group">
                <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tabBackend"><em class="icon ni ni-db"></em><span>Back End</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabFrontend"><em class="icon ni ni-layout"></em><span>Front End</span></a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tabBackend">
                        <div class="card-inner position-relative card-tools-toggle">
                            <div class="card-title-group">
                                <div class="card-tools">
                                    @can('delete-menus')     
                                        <div class="form-inline flex-nowrap gx-3">
                                            <div class="form-wrap w-150px">
                                                <select class="form-select form-select-sm" data-search="off" data-placeholder="Bulk Action">
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
                                        <th class="nk-tb-col"><span class="sub-text">Title</span></th>
                                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Icon</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Position</span></th>
                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Target</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Group</span></th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right"></th>
                                    </tr>
                                </thead><!-- .nk-tb-item -->
                                <tbody>
                                    @foreach ($backend_menu as $backend)
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input uid" id="uid{{ $loop->iteration  }}">
                                                <label class="custom-control-label" for="uid{{ $loop->iteration }}"></label>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-info">
                                                    <span class="tb-lead">{{ $backend->title }}</span>
                                                    <span>{{ $backend->url }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col tb-col-mb">
                                            <span><em class="{{ $backend->icon }}"></em> {{ $backend->icon }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $backend->position }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-lg">
                                            <span>{{ $backend->target }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $backend->type }}</span>
                                        </td>
                                        <td class="nk-tb-col nk-tb-col-tools">
                                            @canany(['update-menus','delete-menus'])      
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    @can('update-menus') 
                                                                        <li><a class="ajaxAction" href="/administrator/menus/{{ Hashids::encode($backend->id).'/edit' }}"><em class="icon ni ni-edit"></em><span>Edit Menu</span></a></li>
                                                                    @endcan
                                                                    @can('delete-menus')
                                                                        <li><a class="deleteItem" href="#"><em class="icon ni ni-trash"></em><span>Delete Menu</span></a></li>
                                                                    @endcan
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            @endcanany
                                        </td>
                                    </tr><!-- .nk-tb-item -->
                                    @endforeach
                                </tbody>
                            </table><!-- .nk-tb-list -->
                        </div><!-- .card-inner -->
                    </div>
                    <div class="tab-pane" id="tabFrontend">
                        @if ($frontend_menu->count() == 0)
                            <p class="text-center mt-5 mb-5">No Data</p>
                        @else
                        <div class="card-inner position-relative card-tools-toggle">
                            <div class="card-title-group">
                                <div class="card-tools">
                                    <div class="form-inline flex-nowrap gx-3">
                                        <div class="form-wrap w-150px">
                                            <select class="form-select form-select-sm" data-search="off" data-placeholder="Bulk Action">
                                                <option value="">Bulk Action</option>
                                                <option value="delete">Delete</option>
                                            </select>
                                        </div>
                                        <div class="btn-wrap">
                                            <span class="d-none d-md-block"><button class="btn btn-dim btn-outline-light disabled">Apply</button></span>
                                            <span class="d-md-none"><button class="btn btn-dim btn-outline-light btn-icon disabled"><em class="icon ni ni-arrow-right"></em></button></span>
                                        </div>
                                    </div><!-- .form-inline -->
                                </div><!-- .card-tools -->
                            </div><!-- .card-title-group -->
                        </div><!-- .card-inner -->
                        <div class="card-inner p-4">
                            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false" id="">
                                <thead class="nk-tb-head bg-light-table">
                                    <tr class="nk-tb-item">
                                        <th class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="uid">
                                                <label class="custom-control-label" for="uid"></label>
                                            </div>
                                        </th>
                                        <th class="nk-tb-col"><span class="sub-text">Title</span></th>
                                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Icon</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Position</span></th>
                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Target</span></th>
                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Group</span></th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right"></th>
                                    </tr>
                                </thead><!-- .nk-tb-item -->
                                <tbody>
                                    @foreach ($frontend_menu as $frontend)
                                    {{-- {{dd($frontend)}} --}}
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input uid" id="uid{{ $loop->iteration  }}">
                                                <label class="custom-control-label" for="uid{{ $loop->iteration }}"></label>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-info">
                                                    <span class="tb-lead">{{ $frontend->title }}</span>
                                                    <span>{{ $frontend->url }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col tb-col-mb">
                                            <span><em class="{{ $frontend->icon }}"></em> {{ $frontend->icon }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $frontend->position }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-lg">
                                            <span>{{ $frontend->target }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $frontend->type }}</span>
                                        </td>
                                        <td class="nk-tb-col nk-tb-col-tools">
                                            @canany(['update-menus','delete-menus'])      
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    @can('update-menus') 
                                                                        <li><a class="ajaxAction" href="/administrator/menus/{{ Hashids::encode($backend->id).'/edit' }}"><em class="icon ni ni-edit"></em><span>Edit Menu</span></a></li>
                                                                    @endcan
                                                                    @can('delete-menus')
                                                                        <li><a class="deleteItem" href="#"><em class="icon ni ni-trash"></em><span>Delete Menu</span></a></li>
                                                                    @endcan
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            @endcanany
                                        </td>
                                    </tr><!-- .nk-tb-item -->
                                    @endforeach
                                </tbody>
                            </table><!-- .nk-tb-list -->
                        </div><!-- .card-inner -->
                        @endif
                    </div>
                </div>
            </div><!-- .card-inner-group -->
        </div><!-- .card -->
    </div><!-- .nk-block -->
</div>

@endsection
