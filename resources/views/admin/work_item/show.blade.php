@extends('layouts.admin')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.work_item')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('work_items.index') }}">@lang('admin.sidebar.work_item')</a></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>@lang('admin.crud.name')(uz)</th>
                                <td>{{ $workItem->name_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.name')(ru)</th>
                                <td>{{ $workItem->name_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.name')(en)</th>
                                <td>{{ $workItem->name_en }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.crud.region')(uz)</th>
                                <td>{{ $workItem->region_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.region')(ru)</th>
                                <td>{{ $workItem->region_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.region')(en)</th>
                                <td>{{ $workItem->region_en }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.crud.application')(uz)</th>
                                <td>{{ $workItem->application_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.application')(ru)</th>
                                <td>{{ $workItem->application_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.application')(en)</th>
                                <td>{{ $workItem->application_en }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.crud.image')</th>
                                <td>
                                    <img src="{{ asset("uploads/".$workItem->image) }}" class="img_admin">
                                </td>
                            </tr><tr>
                                <th>@lang('admin.crud.image_small')</th>
                                <td>
                                    <img src="{{ asset("uploads/".$workItem->image_small) }}" class="img_admin">
                                </td>
                            </tr><tr>
                                <th>@lang('admin.crud.product_image')</th>
                                <td>
                                    <img src="{{ asset("uploads/".$workItem->product_image) }}" class="img_admin">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
