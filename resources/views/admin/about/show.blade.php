@extends('layouts.admin')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.about_company')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('about.index') }}">@lang('admin.sidebar.about_company')</a></li>
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
                                <th>@lang('admin.crud.short_title')(uz)</th>
                                <td>{{ $about->title_short_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.short_title')(ru)</th>
                                <td>{{ $about->title_short_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.short_title')(en)</th>
                                <td>{{ $about->title_short_en }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.text')(uz)</th>
                                <td>{{ $about->text_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.text')(ru)</th>
                                <td>{{ $about->text_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.text')(en)</th>
                                <td>{{ $about->text_en }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.image')</th>
                                <td>
                                    <img src="{{ asset("uploads/".$about->image) }}" class="img_admin">
                                </td>
                            </tr>
                            <tr>
                                <th>@lang('admin.crud.video_link')(en)</th>
                                <td>
                                    <iframe width="420" height="315"
                                            src="{{$about->video_link}}">
                                    </iframe>
                                </td>
                            </tr>
                            <tr>
                                <th>@lang('admin.crud.video_image')</th>
                                <td>
                                    <img src="{{ asset("uploads/".$about->video_image) }}" class="img_admin">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
