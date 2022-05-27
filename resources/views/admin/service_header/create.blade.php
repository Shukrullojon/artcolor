@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.service_header') @lang('admin.sidebar.add')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('service_headers.index') }}">@lang('admin.sidebar.service_header')</a></li>
                        <li class="breadcrumb-item active">@lang('admin.crud.add')</li>
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

                        <form action="{{ route('service_headers.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.title')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="title_uz" class="form-control {{ $errors->has('title_uz') ? "is-invalid":"" }}" value="{{ old('title_uz') }}" required>
                                        @if($errors->has('title_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('title_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.title')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="title_ru" class="form-control {{ $errors->has('title_ru') ? "is-invalid":"" }}" value="{{ old('title_ru') }}" required>
                                        @if($errors->has('title_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('title_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.title')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="title_en" class="form-control {{ $errors->has('title_en') ? "is-invalid":"" }}" value="{{ old('title_en') }}" required>
                                        @if($errors->has('title_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('title_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.button')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="button_uz" class="form-control {{ $errors->has('button_uz') ? "is-invalid":"" }}" value="{{ old('button_uz') }}" required>
                                        @if($errors->has('button_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('button_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.button')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="button_ru" class="form-control {{ $errors->has('button_ru') ? "is-invalid":"" }}" value="{{ old('button_ru') }}" required>
                                        @if($errors->has('button_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('button_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.button')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="button_en" class="form-control {{ $errors->has('button_en') ? "is-invalid":"" }}" value="{{ old('button_en') }}" required>
                                        @if($errors->has('button_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('button_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.button_url')</label><label style="color: red">*</label>
                                        <input type="text" name="button_url" class="form-control {{ $errors->has('button_url') ? "is-invalid":"" }}" value="{{ old('button_url') }}" required>
                                        @if($errors->has('button_url'))
                                            <span class="error invalid-feedback">{{ $errors->first('button_url') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.service')</label><label style="color: red">*</label>
                                       <select class="form-control" name="service_id">
                                            @foreach($services as $service)
                                                <option value="{{$service->id}}">{{$service->title_uz}}</option>
                                           @endforeach
                                       </select>
                                        @if($errors->has('button_url'))
                                            <span class="error invalid-feedback">{{ $errors->first('button_url') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">@lang('admin.crud.save')</button>
                                <a href="{{ route('service_headers.index') }}" class="btn btn-default float-left">@lang('admin.crud.cancel')</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
