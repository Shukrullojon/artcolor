@extends('layouts.admin')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.gallery_category')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('gallerycategory.index') }}">@lang('admin.sidebar.gallery_category')</a></li>
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
                                <td>{{ $category->title_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(ru)</th>
                                <td>{{ $category->title_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(en)</th>
                                <td>{{ $category->title_en }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.info')(uz)</th>
                                <td>{{ $category->info_uz }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.crud.info')(ru)</th>
                                <td>{{ $category->info_ru }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.crud.info')(en)</th>
                                <td>{{ $category->info_en }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.button_url')</th>
                                <td>{{ $category->button_url }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.image')</th>
                                <td>
                                    <img src="{{ asset("uploads/".$category->image) }}" class="img_admin">
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
