@extends('layouts.admin')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.news')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('news.index') }}">@lang('admin.sidebar.news')</a></li>
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
                                <td>{{ $news->title_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(ru)</th>
                                <td>{{ $news->title_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(en)</th>
                                <td>{{ $news->title_en }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.category_name')(uz)</th>
                                <td>{{ $news->category->name_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.category_name')(ru)</th>
                                <td>{{ $news->category->name_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.category_name')(en)</th>
                                <td>{{ $news->category->name_en }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.text')(uz)</th>
                                <td>{{ $news->text_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.text')(ru)</th>
                                <td>{{ $news->text_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.text')(en)</th>
                                <td>{{ $news->text_en }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.status')</th>
                                <td>
                                    <button class="btn @if($news->status) btn-success @else btn-danger @endif" style="border-radius: 30px">@if($news->status) @lang('admin.crud.active') @else @lang('admin.crud.no_active') @endif</button>
                                </td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.image')</th>
                                <td>
                                    <img src="{{ asset("uploads/".$news->image) }}" class="img_admin">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
