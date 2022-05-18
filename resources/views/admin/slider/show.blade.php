@extends('layouts.admin')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.slider')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('slider.index') }}">@lang('admin.sidebar.slider')</a></li>
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
                                <td>{{ $slider->title_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(ru)</th>
                                <td>{{ $slider->title_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(en)</th>
                                <td>{{ $slider->title_en }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.short_title')(uz)</th>
                                <td>{{ $slider->title_short_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.short_title')(ru)</th>
                                <td>{{ $slider->title_short_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.short_title')(en)</th>
                                <td>{{ $slider->title_short_en }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.info')(uz)</th>
                                <td>{{ $slider->info_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.info')(ru)</th>
                                <td>{{ $slider->info_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.info')(en)</th>
                                <td>{{ $slider->info_en }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.button')(uz)</th>
                                <td>{{ $slider->button_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.button')(ru)</th>
                                <td>{{ $slider->button_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.button')(en)</th>
                                <td>{{ $slider->button_en }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.button_url')</th>
                                <td>{{ $slider->button_url }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.button_target')</th>
                                <td>{{ $slider->button_target }}</td>
                            </tr>


                            <tr>
                                <th>@lang('admin.crud.status')</th>
                                <td>
                                    <button class="btn @if($slider->status) btn-success @else btn-danger @endif" style="border-radius: 30px">@if($slider->status) @lang('admin.crud.active') @else @lang('admin.crud.no_active') @endif</button>
                                </td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.image_right')</th>
                                <td>
                                    <img src="{{ asset("uploads/".$slider->image_right) }}" class="img_admin">
                                </td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.image_back')</th>
                                <td>
                                    <img src="{{ asset("uploads/".$slider->image_back) }}" class="img_admin">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
