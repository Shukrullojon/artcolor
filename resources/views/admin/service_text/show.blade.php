@extends('layouts.admin')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.service_text')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('service_texts.index') }}">@lang('admin.sidebar.service_text')</a></li>
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
                                <td>{{ $serviceText->title_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(ru)</th>
                                <td>{{ $serviceText->title_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(en)</th>
                                <td>{{ $serviceText->title_en }}</td>
                            </tr>


                            <tr>
                                <th>@lang('admin.crud.info')(uz)</th>
                                <td>{{ $serviceText->info_uz }}</td>
                            </tr><tr>
                                <th>@lang('admin.crud.info')(ru)</th>
                                <td>{{ $serviceText->info_ru }}</td>
                            </tr><tr>
                                <th>@lang('admin.crud.info')(en)</th>
                                <td>{{ $serviceText->info_en }}</td>
                            </tr>



                            <tr>
                                <th>@lang('admin.crud.image')</th>
                                <td>
                                    <img src="{{ asset("uploads/".$serviceText->image) }}" class="img_admin">
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
