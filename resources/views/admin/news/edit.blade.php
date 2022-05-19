@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.news') @lang('admin.sidebar.add')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('team.index') }}">@lang('admin.sidebar.news')</a></li>
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

                        <form action="{{ route('news.update' , $news->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.title')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="title_uz" class="form-control {{ $errors->has('title_uz') ? "is-invalid":"" }}" value="{{ $news->title_uz }}" required>
                                        @if($errors->has('title_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('title_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.title')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="title_ru" class="form-control {{ $errors->has('title_ru') ? "is-invalid":"" }}" value="{{ $news->title_ru }}" required>
                                        @if($errors->has('title_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('title_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.title')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="title_en" class="form-control {{ $errors->has('title_en') ? "is-invalid":"" }}" value="{{$news->title_en }}" required>
                                        @if($errors->has('title_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('title_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.text')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="text_uz" class="form-control {{ $errors->has('text_uz') ? "is-invalid":"" }}" value="{{ $news->text_uz }}" required>
                                        @if($errors->has('text_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('text_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.text')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="text_ru" class="form-control {{ $errors->has('text_ru') ? "is-invalid":"" }}" value="{{ $news->text_ru }}" required>
                                        @if($errors->has('text_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('text_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.text')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="text_en" class="form-control {{ $errors->has('text_en') ? "is-invalid":"" }}" value="{{ $news->text_en }}" required>
                                        @if($errors->has('text_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('text_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.category_name')</label><label style="color: red">*</label>
                                        <select class="form-control" name="category">
                                            @foreach(\App\Models\Category::all() as $category)
                                                <option @if($category->id == $news->category_new_id) selected="selected" @endif value="{{$category->id}}">{{$category->name_uz}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('category'))
                                            <span class="error invalid-feedback">{{ $errors->first('category') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.slug')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="slug" class="form-control {{ $errors->has('slug') ? "is-invalid":"" }}" value="{{ $news->slug }}" required>
                                        @if($errors->has('slug'))
                                            <span class="error invalid-feedback">{{ $errors->first('slug') }}</span>
                                        @endif
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.status')</label><label style="color: red">*</label>
                                        <select class="form-control" name="status">
                                            <option @if($news->status == 1) selected="selected" @endif value="1">@lang('admin.crud.active')</option>
                                            <option  @if($news->status == 0) selected="selected" @endif  value="0">@lang('admin.crud.no_active')</option>
                                        </select>
                                        @if($errors->has('status'))
                                            <span class="error invalid-feedback">{{ $errors->first('status') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.image')</label><label style="color: red">*</label>
                                        <input type="file" name="image" class="form-control {{ $errors->has('image') ? "is-invalid":"" }}" value="{{ old('image') }}" >
                                        @if($errors->has('image'))
                                            <span class="error invalid-feedback">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">@lang('admin.crud.save')</button>
                                <a href="{{ route('news.index') }}" class="btn btn-default float-left">@lang('admin.crud.cancel')</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
