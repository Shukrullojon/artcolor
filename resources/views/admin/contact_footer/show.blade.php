@extends('layouts.admin')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.contact_footer')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('contact_footers.index') }}">@lang('admin.sidebar.contact_footer')</a></li>
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
                                <td>{{ $contactFooter->title_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(ru)</th>
                                <td>{{ $contactFooter->title_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(en)</th>
                                <td>{{ $contactFooter->title_en }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.crud.info')(uz)</th>
                                <td>{{ $contactFooter->info_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.info')(ru)</th>
                                <td>{{ $contactFooter->info_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.info')(en)</th>
                                <td>{{ $contactFooter->info_en }}</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
