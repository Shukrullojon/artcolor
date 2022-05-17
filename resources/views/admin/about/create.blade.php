@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.our_team') @lang('admin.sidebar.add')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('team.index') }}">@lang('admin.sidebar.our_team')</a></li>
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

                        <form action="{{ route('about.store') }}" method="post" enctype="multipart/form-data">
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
                                        <label>@lang('admin.crud.short_title')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="short_title_uz" class="form-control {{ $errors->has('short_title_uz') ? "is-invalid":"" }}" value="{{ old('short_title_uz') }}" required>
                                        @if($errors->has('short_title_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('short_title_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.short_title')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="short_title_ru" class="form-control {{ $errors->has('short_title_ru') ? "is-invalid":"" }}" value="{{ old('short_title_ru') }}" required>
                                        @if($errors->has('short_title_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('short_title_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.short_title')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="short_title_en" class="form-control {{ $errors->has('short_title_en') ? "is-invalid":"" }}" value="{{ old('short_title_en') }}" required>
                                        @if($errors->has('short_title_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('short_title_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.text')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="text_uz" class="form-control {{ $errors->has('text_uz') ? "is-invalid":"" }}" value="{{ old('text_uz') }}" required>
                                        @if($errors->has('text_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('text_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.text')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="text_ru" class="form-control {{ $errors->has('text_ru') ? "is-invalid":"" }}" value="{{ old('text_ru') }}" required>
                                        @if($errors->has('short_title_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('text_tu') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.text')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="text_en" class="form-control {{ $errors->has('text_en') ? "is-invalid":"" }}" value="{{ old('text_en') }}" required>
                                        @if($errors->has('short_title_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('text_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.right_text')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="right_text_uz" class="form-control {{ $errors->has('right_text_uz') ? "is-invalid":"" }}" value="{{ old('right_text_uz') }}" required>
                                        @if($errors->has('right_text_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('right_text_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.right_text')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="right_text_ru" class="form-control {{ $errors->has('right_text_ru') ? "is-invalid":"" }}" value="{{ old('right_text_ru') }}" required>
                                        @if($errors->has('right_text_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('right_text-ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.right_text')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="right_text_en" class="form-control {{ $errors->has('right_text_en') ? "is-invalid":"" }}" value="{{ old('right_text_en') }}" required>
                                        @if($errors->has('right_text_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('right_text_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>


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
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.video_image')</label><label style="color: red">*</label>
                                        <input type="file" name="video_image" class="form-control {{ $errors->has('video_image') ? "is-invalid":"" }}" value="{{ old('video_image') }}" required>
                                        @if($errors->has('video_image'))
                                            <span class="error invalid-feedback">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.video_link')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="video_link" class="form-control {{ $errors->has('video_link') ? "is-invalid":"" }}" value="{{ old('video_link') }}" required>
                                        @if($errors->has('video_link'))
                                            <span class="error invalid-feedback">{{ $errors->first('video_link') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">@lang('admin.crud.save')</button>
                                <a href="{{ route('team.index') }}" class="btn btn-default float-left">@lang('admin.crud.cancel')</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
