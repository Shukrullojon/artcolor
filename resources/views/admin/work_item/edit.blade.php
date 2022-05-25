@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.work_item') @lang('admin.sidebar.add')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('work_items.index') }}">@lang('admin.sidebar.work_item')</a></li>
                        <li class="breadcrumb-item active">@lang('admin.crud.update')</li>
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
                        <h3 class="card-title">@lang('admin.crud.update')</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('work_items.update' , $workItem->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.name')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="name_uz" class="form-control {{ $errors->has('name_uz') ? "is-invalid":"" }}" value="{{ $workItem->name_uz }}" required>
                                        @if($errors->has('name_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('name_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.name')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="name_ru" class="form-control {{ $errors->has('name_ru') ? "is-invalid":"" }}" value="{{ $workItem->name_ru }}" required>
                                        @if($errors->has('name_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('name_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.name')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="name_en" class="form-control {{ $errors->has('name_en') ? "is-invalid":"" }}" value="{{ $workItem->name_en }}" required>
                                        @if($errors->has('name_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('name_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.region')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="region_uz" class="form-control {{ $errors->has('region_uz') ? "is-invalid":"" }}" value="{{ $workItem->region_uz }}" required>
                                        @if($errors->has('region_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('region_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.region')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="region_ru" class="form-control {{ $errors->has('region_ru') ? "is-invalid":"" }}" value="{{ $workItem->region_ru }}" required>
                                        @if($errors->has('region_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('region_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.region q')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="region_en" class="form-control {{ $errors->has('region_en') ? "is-invalid":"" }}" value="{{ $workItem->region_en }}" required>
                                        @if($errors->has('region_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('region_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.application')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="application_uz" class="form-control {{ $errors->has('application_uz') ? "is-invalid":"" }}" value="{{ $workItem->application_uz }}" required>
                                        @if($errors->has('application_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('application_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.application')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="application_ru" class="form-control {{ $errors->has('application_ru') ? "is-invalid":"" }}" value="{{ $workItem->application_ru }}" required>
                                        @if($errors->has('application_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('application_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.application')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="application_en" class="form-control {{ $errors->has('application_en') ? "is-invalid":"" }}" value="{{ $workItem->application_en  }}" required>
                                        @if($errors->has('application_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('application_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.image')</label><label style="color: red">*</label>
                                        <input type="file" name="image" class="form-control {{ $errors->has('image') ? "is-invalid":"" }}" value="{{ old('image') }}" >
                                        @if($errors->has('image'))
                                            <span class="error invalid-feedback">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.image_small')</label><label style="color: red">*</label>
                                        <input type="file" name="image_small" class="form-control {{ $errors->has('image_small') ? "is-invalid":"" }}" value="{{ old('image_small') }}" >
                                        @if($errors->has('image_small'))
                                            <span class="error invalid-feedback">{{ $errors->first('image_small') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.product_image')</label><label style="color: red">*</label>
                                        <input type="file" name="product_image" class="form-control {{ $errors->has('product_image') ? "is-invalid":"" }}" value="{{ old('product_image') }}" >
                                        @if($errors->has('product_image'))
                                            <span class="error invalid-feedback">{{ $errors->first('product_image') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>




                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">@lang('admin.crud.update')</button>
                                <a href="{{ route('work_items.index') }}" class="btn btn-default float-left">@lang('admin.crud.cancel')</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
