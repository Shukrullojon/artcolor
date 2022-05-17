@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.our_team') @lang('admin.sidebar.edit')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('team.index') }}">@lang('admin.sidebar.our_team')</a></li>
                        <li class="breadcrumb-item active">@lang('admin.sidebar.edit')</li>
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
                        <h3 class="card-title">@lang('admin.sidebar.edit')</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('team.update',$team->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.fio')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="fio_uz" class="form-control {{ $errors->has('fio_uz') ? "is-invalid":"" }}" value="{{ old('fio_uz',$team->fio_uz) }}" required>
                                        @if($errors->has('fio_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('fio_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.fio')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="fio_ru" class="form-control {{ $errors->has('fio_ru') ? "is-invalid":"" }}" value="{{ old('fio_ru',$team->fio_ru) }}" required>
                                        @if($errors->has('fio_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('fio_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.fio')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="fio_en" class="form-control {{ $errors->has('fio_en') ? "is-invalid":"" }}" value="{{ old('fio_en',$team->fio_en) }}" required>
                                        @if($errors->has('fio_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('fio_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.status')</label><label style="color: red">*</label>
                                        <select class="form-control" name="status">
                                            <option @if($team->status == 1) selected @endif value="1">@lang('admin.crud.active')</option>
                                            <option @if($team->status == 0) selected @endif value="0">@lang('admin.crud.no_active')</option>
                                        </select>
                                        @if($errors->has('status'))
                                            <span class="error invalid-feedback">{{ $errors->first('status') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.image')</label><label style="color: red">*</label>
                                        <input type="file" name="image" class="form-control {{ $errors->has('image') ? "is-invalid":"" }}" value="{{ old('image') }}">
                                        @if($errors->has('image'))
                                            <span class="error invalid-feedback">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.position')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="position_uz" class="form-control {{ $errors->has('position_uz') ? "is-invalid":"" }}" value="{{ old('position_uz',$team->position_uz) }}" required>
                                        @if($errors->has('position_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('position_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.position')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="position_ru" class="form-control {{ $errors->has('position_ru') ? "is-invalid":"" }}" value="{{ old('position_ru',$team->position_ru) }}" required>
                                        @if($errors->has('position_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('position_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.position')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="position_en" class="form-control {{ $errors->has('position_en') ? "is-invalid":"" }}" value="{{ old('position_en',$team->position_en) }}" required>
                                        @if($errors->has('position_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('position_en') }}</span>
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
