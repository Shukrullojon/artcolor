@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.product_type') @lang('admin.sidebar.edit')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('producttype.index') }}">@lang('admin.sidebar.product_type')</a></li>
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

                        <form action="{{ route("producttype.update",$productType->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.title')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="title_uz" class="form-control {{ $errors->has('title_uz') ? "is-invalid":"" }}" value="{{ old('title_uz',$productType->title_uz) }}" required>
                                        @if($errors->has('title_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('title_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.title')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="title_ru" class="form-control {{ $errors->has('title_ru') ? "is-invalid":"" }}" value="{{ old('title_ru',$productType->title_ru) }}" required>
                                        @if($errors->has('title_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('title_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.title')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="title_en" class="form-control {{ $errors->has('title_en') ? "is-invalid":"" }}" value="{{ old('title_en',$productType->title_en) }}" required>
                                        @if($errors->has('title_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('title_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.info')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="info_uz" class="form-control {{ $errors->has('info_uz') ? "is-invalid":"" }}" value="{{ old('info_uz',$productType->info_uz) }}" required>
                                        @if($errors->has('info_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('info_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.info')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="info_ru" class="form-control {{ $errors->has('info_ru') ? "is-invalid":"" }}" value="{{ old('info_ru',$productType->info_ru) }}" required>
                                        @if($errors->has('info_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('info_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.info')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="info_en" class="form-control {{ $errors->has('info_en') ? "is-invalid":"" }}" value="{{ old('info_en',$productType->info_en) }}" required>
                                        @if($errors->has('info_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('info_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.short_title')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="title_short_uz" class="form-control {{ $errors->has('title_short_uz') ? "is-invalid":"" }}" value="{{ old('title_short_uz',$productType->title_short_uz) }}" required>
                                        @if($errors->has('title_short_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('title_short_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.short_title')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="title_short_ru" class="form-control {{ $errors->has('title_short_ru') ? "is-invalid":"" }}" value="{{ old('title_short_ru',$productType->title_short_ru) }}" required>
                                        @if($errors->has('title_short_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('title_short_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.short_title')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="title_short_en" class="form-control {{ $errors->has('title_short_en') ? "is-invalid":"" }}" value="{{ old('title_short_en',$productType->title_short_en) }}" required>
                                        @if($errors->has('title_short_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('title_short_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.text')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="text_uz" class="form-control {{ $errors->has('text_uz') ? "is-invalid":"" }}" value="{{ old('text_uz',$productType->text_uz) }}" required>
                                        @if($errors->has('text_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('text_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.text')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="text_ru" class="form-control {{ $errors->has('text_ru') ? "is-invalid":"" }}" value="{{ old('text_ru',$productType->text_ru) }}" required>
                                        @if($errors->has('text_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('text_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.text')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="text_en" class="form-control {{ $errors->has('text_en') ? "is-invalid":"" }}" value="{{ old('text_en',$productType->text_en) }}" required>
                                        @if($errors->has('text_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('text_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.status')</label><label style="color: red">*</label>
                                        <select class="form-control" name="status">
                                            <option @if($productType->status == 1) selected @endif value="1">@lang('admin.crud.active')</option>
                                            <option @if($productType->status == 0) selected @endif value="0">@lang('admin.crud.no_active')</option>
                                        </select>
                                        @if($errors->has('status'))
                                            <span class="error invalid-feedback">{{ $errors->first('status') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.button_url')</label><label style="color: red">*</label>
                                        <input type="text" name="button_url" class="form-control {{ $errors->has('button_url') ? "is-invalid":"" }}" value="{{ old('button_url',$productType->button_url) }}" required>
                                        @if($errors->has('button_url'))
                                            <span class="error invalid-feedback">{{ $errors->first('button_url') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">@lang('admin.crud.save')</button>
                                <a href="{{ route('producttype.index') }}" class="btn btn-default float-left">@lang('admin.crud.cancel')</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
