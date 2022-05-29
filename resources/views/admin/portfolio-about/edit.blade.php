@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.portfolio_about') @lang('admin.sidebar.edit')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('portfolioabout.index') }}">@lang('admin.sidebar.portfolio_about')</a></li>
                        <li class="breadcrumb-item active">@lang('admin.crud.edit')</li>
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
                        <h3 class="card-title">@lang('admin.crud.edit')</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('portfolioabout.update',$about->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.info')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="info_uz" class="form-control {{ $errors->has('info_uz') ? "is-invalid":"" }}" value="{{ old('info_uz',$about->info_uz) }}" required>
                                        @if($errors->has('info_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('info_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.info')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="info_ru" class="form-control {{ $errors->has('info_ru') ? "is-invalid":"" }}" value="{{ old('info_ru',$about->info_ru) }}" required>
                                        @if($errors->has('info_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('info_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.info')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="info_en" class="form-control {{ $errors->has('info_en') ? "is-invalid":"" }}" value="{{ old('info_en',$about->info_en) }}" required>
                                        @if($errors->has('info_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('info_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.social')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="social_uz" class="form-control {{ $errors->has('social_uz') ? "is-invalid":"" }}" value="{{ old('social_uz',$about->social_uz) }}" required>
                                        @if($errors->has('social_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('social_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.social')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="social_ru" class="form-control {{ $errors->has('social_ru') ? "is-invalid":"" }}" value="{{ old('social_ru',$about->social_ru) }}" required>
                                        @if($errors->has('social_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('social_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.social')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="social_en" class="form-control {{ $errors->has('social_en') ? "is-invalid":"" }}" value="{{ old('social_en',$about->social_en) }}" required>
                                        @if($errors->has('social_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('social_en') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.link')</label><label style="color: red">*</label>
                                        <input type="text" name="link" class="form-control {{ $errors->has('link') ? "is-invalid":"" }}" value="{{ old('link',$about->link) }}" required>
                                        @if($errors->has('link'))
                                            <span class="error invalid-feedback">{{ $errors->first('link') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">@lang('admin.crud.save')</button>
                                <a href="{{ route('portfolioabout.index') }}" class="btn btn-default float-left">@lang('admin.crud.cancel')</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
