@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.product') @lang('admin.sidebar.add')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">@lang('admin.sidebar.product')</a></li>
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

                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.category')</label><label style="color: red">*</label>
                                        <select name="sub_category_id" class="form-control">
                                            @foreach($subs as $sub)
                                                <option value="{{ $sub->id }}">{{ $sub->title_uz }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('sub_category_id'))
                                            <span class="error invalid-feedback">{{ $errors->first('sub_category_id') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.sidebar.product_filter')</label><label style="color: red">*</label>
                                        <select name="filter_id" class="form-control">
                                            @foreach($filters as $filter)
                                                <option value="{{ $filter->id }}">{{ $filter->title_uz }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('filter_id'))
                                            <span class="error invalid-feedback">{{ $errors->first('filter_id') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>

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
                                        <label>@lang('admin.crud.info')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="info_uz" class="form-control {{ $errors->has('info_uz') ? "is-invalid":"" }}" value="{{ old('info_uz') }}" required>
                                        @if($errors->has('info_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('info_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.info')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="info_ru" class="form-control {{ $errors->has('info_ru') ? "is-invalid":"" }}" value="{{ old('info_ru') }}" required>
                                        @if($errors->has('info_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('info_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.info')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="info_en" class="form-control {{ $errors->has('info_en') ? "is-invalid":"" }}" value="{{ old('info_en') }}" required>
                                        @if($errors->has('info_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('info_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.application')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="application_uz" class="form-control {{ $errors->has('application_uz') ? "is-invalid":"" }}" value="{{ old('application_uz') }}" required>
                                        @if($errors->has('application_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('application_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.application')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="application_ru" class="form-control {{ $errors->has('application_ru') ? "is-invalid":"" }}" value="{{ old('application_ru') }}" required>
                                        @if($errors->has('application_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('application_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.application')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="application_en" class="form-control {{ $errors->has('application_en') ? "is-invalid":"" }}" value="{{ old('application_en') }}" required>
                                        @if($errors->has('application_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('application_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.compound')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="compound_uz" class="form-control {{ $errors->has('compound_uz') ? "is-invalid":"" }}" value="{{ old('compound_uz') }}" required>
                                        @if($errors->has('compound_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('compound_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.compound')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="compound_ru" class="form-control {{ $errors->has('compound_ru') ? "is-invalid":"" }}" value="{{ old('compound_ru') }}" required>
                                        @if($errors->has('compound_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('compound_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.compound')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="compound_en" class="form-control {{ $errors->has('compound_en') ? "is-invalid":"" }}" value="{{ old('compound_en') }}" required>
                                        @if($errors->has('compound_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('compound_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.consumption')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="consumption_uz" class="form-control {{ $errors->has('consumption_uz') ? "is-invalid":"" }}" value="{{ old('consumption_uz') }}" required>
                                        @if($errors->has('consumption_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('consumption_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.consumption')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="consumption_ru" class="form-control {{ $errors->has('consumption_ru') ? "is-invalid":"" }}" value="{{ old('consumption_ru') }}" required>
                                        @if($errors->has('consumption_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('consumption_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.consumption')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="consumption_en" class="form-control {{ $errors->has('consumption_en') ? "is-invalid":"" }}" value="{{ old('consumption_en') }}" required>
                                        @if($errors->has('consumption_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('consumption_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.peculiarit')(uz)</label><label style="color: red">*</label>
                                        <textarea rows="4" id="summernote" name="peculiarit_uz" class="form-control" required>
                                        </textarea>
                                        @if($errors->has('peculiarit_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('peculiarit_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.peculiarit')(ru)</label><label style="color: red">*</label>
                                        <textarea rows="4" id="summernote1" name="peculiarit_ru" class="form-control" required>
                                        </textarea>
                                        @if($errors->has('consumption_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('consumption_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.peculiarit')(en)</label><label style="color: red">*</label>
                                        <textarea rows="4" id="summernote2" name="peculiarit_en" class="form-control" required>
                                        </textarea>
                                        @if($errors->has('consumption_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('consumption_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.accordion_title')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="accordion_title_uz" class="form-control {{ $errors->has('accordion_title_uz') ? "is-invalid":"" }}" value="{{ old('accordion_title_uz') }}" required>
                                        @if($errors->has('accordion_title_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('accordion_title_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.accordion_title')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="accordion_title_ru" class="form-control {{ $errors->has('accordion_title_ru') ? "is-invalid":"" }}" value="{{ old('accordion_title_ru') }}" required>
                                        @if($errors->has('accordion_title_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('accordion_title_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.accordion_title')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="accordion_title_en" class="form-control {{ $errors->has('accordion_title_en') ? "is-invalid":"" }}" value="{{ old('accordion_title_en') }}" required>
                                        @if($errors->has('accordion_title_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('accordion_title_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.accordion_info')(uz)</label><label style="color: red">*</label>
                                        <textarea rows="4" id="summernote3" name="accordion_info_uz" class="form-control" required>
                                        </textarea>
                                        @if($errors->has('accordion_info_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('accordion_info_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.accordion_info')(ru)</label><label style="color: red">*</label>
                                        <textarea rows="4" id="summernote4" name="accordion_info_ru" class="form-control" required>
                                        </textarea>
                                        @if($errors->has('accordion_info_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('accordion_info_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.accordion_info')(en)</label><label style="color: red">*</label>
                                        <textarea rows="4" id="summernote5" name="accordion_info_en" class="form-control" required>
                                        </textarea>
                                        @if($errors->has('accordion_info_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('accordion_info_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.image')</label>
                                        <input type="file" name="image[]" multiple class="form-control">
                                        </textarea>
                                        @if($errors->has('accordion_info_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('accordion_info_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.gallery_image')</label>
                                        <input type="file" name="gallery_image[]" multiple class="form-control">
                                        </textarea>
                                        @if($errors->has('gallery_image'))
                                            <span class="error invalid-feedback">{{ $errors->first('gallery_image') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{--character start--}}
                            <div id="character">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <label>@lang('admin.crud.character')(uz)</label>
                                            <input type="text" name="character_uz[]" class="form-control {{ $errors->has('character_uz') ? "is-invalid":"" }}" value="{{ old('character_uz') }}">
                                            @if($errors->has('character_uz'))
                                                <span class="error invalid-feedback">{{ $errors->first('character_uz') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <label>@lang('admin.crud.character')(ru)</label>
                                            <input type="text" name="character_ru[]" class="form-control {{ $errors->has('character_ru') ? "is-invalid":"" }}" value="{{ old('character_ru') }}">
                                            @if($errors->has('character_ru'))
                                                <span class="error invalid-feedback">{{ $errors->first('character_ru') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <label>@lang('admin.crud.character')(en)</label>
                                            <input type="text" name="character_en[]" class="form-control {{ $errors->has('character_en') ? "is-invalid":"" }}" value="{{ old('character_en') }}">
                                            @if($errors->has('character_en'))
                                                <span class="error invalid-feedback">{{ $errors->first('character_en') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="addCharacter"></div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <a class="btn btn-primary form-control" id="add_character">@lang('admin.crud.character') @lang('admin.crud.add')</a>
                                    </div>
                                </div>
                            </div>
                            {{--character end--}}

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
        $(document).on("click","#add_character",function() {
            var inputs = $("#character").html();
            $("#addCharacter").append(inputs);
        });
    </script>
@endsection
