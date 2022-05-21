@extends('layouts.admin')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.product_type')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('producttype.index') }}">@lang('admin.sidebar.product_type')</a></li>
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
                                <td>{{ $productType->title_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(ru)</th>
                                <td>{{ $productType->title_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(en)</th>
                                <td>{{ $productType->title_en }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.info')(uz)</th>
                                <td>{{ $productType->info_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.info')(ru)</th>
                                <td>{{ $productType->info_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.info')(en)</th>
                                <td>{{ $productType->info_en }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.short_title')(uz)</th>
                                <td>{{ $productType->title_short_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.short_title')(ru)</th>
                                <td>{{ $productType->title_short_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.short_title')(en)</th>
                                <td>{{ $productType->title_short_en }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.text')(uz)</th>
                                <td>{{ $productType->text_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.text')(ru)</th>
                                <td>{{ $productType->text_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.text')(en)</th>
                                <td>{{ $productType->text_en }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.button_url')</th>
                                <td>{{ $productType->button_url }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.status')</th>
                                <td>
                                    <button class="btn @if($productType->status) btn-success @else btn-danger @endif" style="border-radius: 30px">@if($productType->status) @lang('admin.crud.active') @else @lang('admin.crud.no_active') @endif</button>
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
