@extends('layouts.admin')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.service_item')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('service_items.index') }}">@lang('admin.sidebar.service_item')</a></li>
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
                                <th>@lang('admin.crud.title')(uz)</th>
                                <td>{{ $serviceItem->title_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(ru)</th>
                                <td>{{ $serviceItem->title_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(en)</th>
                                <td>{{ $serviceItem->title_en }}</td>
                            </tr>


                            <tr>
                                <th>@lang('admin.crud.info')(uz)</th>
                                <td>{{ $serviceItem->info_uz }}</td>
                            </tr><tr>
                                <th>@lang('admin.crud.info')(ru)</th>
                                <td>{{ $serviceItem->info_ru }}</td>
                            </tr><tr>
                                <th>@lang('admin.crud.info')(en)</th>
                                <td>{{ $serviceItem->info_en }}</td>
                            </tr>
                            @if(!empty($serviceItem->service()))
                            <tr>
                                <th>@lang('admin.crud.service')</th>
                                <td>{{ $serviceItem->service->title_uz}}</td>
                            </tr>

                            @endif


                            <tr>
                                <th>@lang('admin.crud.image')</th>
                                <td>
                                    <img src="{{ asset("uploads/".$serviceItem->image) }}" class="img_admin">
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
