@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.category') @lang('admin.sidebar.edit')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">@lang('admin.sidebar.category')</a></li>
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
                        <h3 class="card-title">@lang('admin.crud.add')</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('category.update',$category->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.title')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="title_uz" class="form-control {{ $errors->has('title_uz') ? "is-invalid":"" }}" value="{{ old('title_uz',$category->title_uz) }}" required>
                                        @if($errors->has('title_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('title_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.title')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="title_ru" class="form-control {{ $errors->has('title_ru') ? "is-invalid":"" }}" value="{{ old('title_ru',$category->title_ru) }}" required>
                                        @if($errors->has('title_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('title_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.title')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="title_en" class="form-control {{ $errors->has('title_en') ? "is-invalid":"" }}" value="{{ old('title_en',$category->title_en) }}" required>
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
                                        <input type="text" name="info_uz" class="form-control {{ $errors->has('info_uz') ? "is-invalid":"" }}" value="{{ old('info_uz',$category->info_uz) }}" required>
                                        @if($errors->has('info_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('info_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.info')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="info_ru" class="form-control {{ $errors->has('info_ru') ? "is-invalid":"" }}" value="{{ old('info_ru',$category->title_ru) }}" required>
                                        @if($errors->has('info_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('info_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.info')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="info_en" class="form-control {{ $errors->has('info_en') ? "is-invalid":"" }}" value="{{ old('info_en',$category->title_en) }}" required>
                                        @if($errors->has('info_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('info_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.colss')</label><label style="color: red">*</label>
                                        <select name="colls" class="form-control">
                                            <option @if($category->colls == 0) selected @endif value="0">0</option>
                                            <option @if($category->colls == 1) selected @endif value="1">1</option>
                                            <option @if($category->colls == 2) selected @endif value="2">2</option>
                                        </select>
                                        @if($errors->has('colls'))
                                            <span class="error invalid-feedback">{{ $errors->first('colls') }}</span>
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

                            <hr>

                            <div>
                                @if(count($category->items)>0)
                                    @foreach($category->items as $item)
                                        <div class="row" id="item_{{ $item->id }}">
                                            <div class="col-lg-3 col-sm-12">
                                                <div class="form-group">
                                                    <label>@lang('admin.crud.items')(uz)</label>
                                                    <input type="text" name="item_uz[]" value="{{ $item->title_uz }}" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-sm-12">
                                                <div class="form-group">
                                                    <label>@lang('admin.crud.items')(ru)</label>
                                                    <input type="text" name="item_ru[]" value="{{ $item->title_ru }}" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-sm-12">
                                                <div class="form-group">
                                                    <label>@lang('admin.crud.items')(en)</label>
                                                    <input type="text" name="item_en[]" value="{{ $item->title_en }}" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label></label>
                                                    <button style="margin-top: 33px" id="deleteItem" val="{{ $item->id }}"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>

                            <div id="items" @if(count($category->items)>0) style="display: none" @endif>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <label>@lang('admin.crud.items')(uz)</label>
                                            <input type="text" name="item_uz[]" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <label>@lang('admin.crud.items')(ru)</label>
                                            <input type="text" name="item_ru[]" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <label>@lang('admin.crud.items')(en)</label>
                                            <input type="text" name="item_en[]" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="show_item"></div>

                            <div class="form-group">
                                <a id="addItem" class="btn btn-primary form-control">@lang('admin.crud.items') @lang('admin.crud.add')</a>
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

@section('scripts')
    <script>
        $(document).on("click","#addItem",function() {
            var inputs = $("#items").html();
            $("#show_item").append(inputs);
        });

        $(document).on("click","#deleteItem",function (){
            var item = $(this).attr("val");
            $("#item_"+item).remove();
        });
    </script>
@endsection
