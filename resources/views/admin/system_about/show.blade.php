@extends('layouts.admin')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.system_about')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('system_abouts.index') }}">@lang('admin.sidebar.system_about')</a></li>
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
                                <td>{{ $systemAbout->title_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(ru)</th>
                                <td>{{ $systemAbout->title_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(en)</th>
                                <td>{{ $systemAbout->title_en }}</td>
                            </tr> <tr>
                                <th>@lang('admin.crud.info')(uz)</th>
                                <td>{{ $systemAbout->info_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.info')(ru)</th>
                                <td>{{ $systemAbout->info_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.info')(en)</th>
                                <td>{{ $systemAbout->info_en }}</td>
                            </tr>




                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
