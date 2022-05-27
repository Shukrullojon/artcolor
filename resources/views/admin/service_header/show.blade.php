@extends('layouts.admin')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.service_header')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('service_headers.index') }}">@lang('admin.sidebar.service_header')</a></li>
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
                                <td>{{ $serviceHeader->title_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(ru)</th>
                                <td>{{ $serviceHeader->title_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(en)</th>
                                <td>{{ $serviceHeader->title_en }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.crud.button')(uz)</th>
                                <td>{{ $serviceHeader->button_uz }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.crud.service')</th>
                                @if(!empty($serviceItemHeader->service()))
                                    <td>{{ $serviceItemHeader->service->title_uz }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>@lang('admin.crud.button')(ru)</th>
                                <td>{{ $serviceHeader->button_ru }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.crud.button')(en)</th>
                                <td>{{ $serviceHeader->button_en }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.crud.button_url')(en)</th>
                                <td>{{ $serviceHeader->button_url }}</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
