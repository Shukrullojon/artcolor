@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.category') @lang('admin.sidebar.add')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('team.index') }}">@lang('admin.sidebar.category')</a></li>
                        <li class="breadcrumb-item active">@lang('admin.crud.category')</li>
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
                    <div class="card-header">
                        <h3 class="card-title">@lang('admin.crud.add')</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('categories.update' , $category->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.category_name')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="name_uz" class="form-control {{ $errors->has('name_uz') ? "is-invalid":"" }}" value="{{ $category->name_uz }}" required>
                                        @if($errors->has('name_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('name_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.category_name')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="name_ru" class="form-control {{ $errors->has('name_ru') ? "is-invalid":"" }}" value="{{ $category->name_ru }}" required>
                                        @if($errors->has('name_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('name_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.category_name')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="name_en" class="form-control {{ $errors->has('name_en') ? "is-invalid":"" }}" value="{{ $category->name_en }}" required>
                                        @if($errors->has('name_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('name_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">@lang('admin.crud.save')</button>
                                <a href="{{ route('categories.index') }}" class="btn btn-default float-left">@lang('admin.crud.cancel')</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
