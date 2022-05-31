@extends('layouts.admin')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.branch_about')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('branchabout.index') }}">@lang('admin.sidebar.branch_about')</a></li>
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
                                <td>{{ $about->title_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(ru)</th>
                                <td>{{ $about->title_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(en)</th>
                                <td>{{ $about->title_en }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.info')(uz)</th>
                                <td>{{ $about->info_uz }}</td>
                            </tr> <tr>
                                <th>@lang('admin.crud.info')(ru)</th>
                                <td>{{ $about->info_ru }}</td>
                            </tr> <tr>
                                <th>@lang('admin.crud.info')(en)</th>
                                <td>{{ $about->info_en }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
