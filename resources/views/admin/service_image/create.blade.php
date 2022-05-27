@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.service_image') @lang('admin.sidebar.add')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('service_images.index') }}">@lang('admin.sidebar.service_image')</a></li>
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

                        <form action="{{ route('service_images.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.image')</label><label style="color: red">*</label>
                                        <input type="file" name="image" class="form-control {{ $errors->has('image') ? "is-invalid":"" }}" value="{{ old('image') }}" required>
                                        @if($errors->has('image'))
                                            <span class="error invalid-feedback">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">@lang('admin.crud.save')</button>
                                <a href="{{ route('service_images.index') }}" class="btn btn-default float-left">@lang('admin.crud.cancel')</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
