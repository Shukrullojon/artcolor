@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.contact') @lang('admin.sidebar.edit')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('contacts.index') }}">@lang('admin.sidebar.contact')</a></li>
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

                        <form action="{{ route('contacts.update' , $contact->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.title')(uz)</label><label style="color: red">*</label>
                                        <input type="text" name="title_uz" class="form-control {{ $errors->has('title_uz') ? "is-invalid":"" }}" value="{{ $contact->title_uz }}" required>
                                        @if($errors->has('title_uz'))
                                            <span class="error invalid-feedback">{{ $errors->first('title_uz') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.title')(ru)</label><label style="color: red">*</label>
                                        <input type="text" name="title_ru" class="form-control {{ $errors->has('title_ru') ? "is-invalid":"" }}" value="{{ $contact->title_ru }}" required>
                                        @if($errors->has('title_ru'))
                                            <span class="error invalid-feedback">{{ $errors->first('title_ru') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.title')(en)</label><label style="color: red">*</label>
                                        <input type="text" name="title_en" class="form-control {{ $errors->has('title_en') ? "is-invalid":"" }}" value="{{ $contact->title_en }}" required>
                                        @if($errors->has('title_en'))
                                            <span class="error invalid-feedback">{{ $errors->first('title_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.phone')</label><label style="color: red">*</label>
                                        <input type="text" name="phone_1" class="form-control {{ $errors->has('phone_1') ? "is-invalid":"" }}" value="{{ $contact->phone_1 }}" required>
                                        @if($errors->has('phone_1'))
                                            <span class="error invalid-feedback">{{ $errors->first('phone_1') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.phone') 2</label><label style="color: red">*</label>
                                        <input type="text" name="phone_2" class="form-control {{ $errors->has('phone_2') ? "is-invalid":"" }}" value="{{ $contact->phone_2 }}" required>
                                        @if($errors->has('phone_2'))
                                            <span class="error invalid-feedback">{{ $errors->first('phone_2') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.email')(ru)</label><label style="color: red">*</label>
                                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? "is-invalid":"" }}" value="{{ $contact->email }}" required>
                                        @if($errors->has('email'))
                                            <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.telegram')</label><label style="color: red">*</label>
                                        <input type="text" name="telegram" class="form-control {{ $errors->has('telegram') ? "is-invalid":"" }}" value="{{ $contact->telegram }}" required>
                                        @if($errors->has('telegram'))
                                            <span class="error invalid-feedback">{{ $errors->first('telegram') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.youtube')</label><label style="color: red">*</label>
                                        <input type="text" name="youtube" class="form-control {{ $errors->has('youtube') ? "is-invalid":"" }}" value="{{ $contact->youtube }}" required>
                                        @if($errors->has('youtube'))
                                            <span class="error invalid-feedback">{{ $errors->first('youtube') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.instagram')</label><label style="color: red">*</label>
                                        <input type="text" name="instagram" class="form-control {{ $errors->has('instagram') ? "is-invalid":"" }}" value="{{ $contact->instagram }}" required>
                                        @if($errors->has('instagram'))
                                            <span class="error invalid-feedback">{{ $errors->first('instagram') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.facebook')</label><label style="color: red">*</label>
                                        <input type="text" name="facebook" class="form-control {{ $errors->has('facebook') ? "is-invalid":"" }}" value="{{ $contact->facebook }}" required>
                                        @if($errors->has('facebook'))
                                            <span class="error invalid-feedback">{{ $errors->first('facebook') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.timetable')</label><label style="color: red">*</label>
                                        <input type="text" name="timetable" class="form-control {{ $errors->has('timetable') ? "is-invalid":"" }}" value="{{ $contact->timetable }}" required>
                                        @if($errors->has('timetable'))
                                            <span class="error invalid-feedback">{{ $errors->first('timetable') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('admin.crud.logo')</label><label style="color: red">*</label>
                                        <input type="file" name="image" class="form-control {{ $errors->has('image') ? "is-invalid":"" }}" value="{{ old('image') }}" required>
                                        @if($errors->has('image'))
                                            <span class="error invalid-feedback">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <?php
                               $i = 0;
                            ?>
                            @foreach($contact->addresses as $address)
                                <?php
                                $i ++ ;
                                ?>
                            <div id="addressInputs">

                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <label>@lang('admin.crud.address')(UZ) ({{$i}})</label><label style="color: red">*</label>
                                            <input type="text" name="address_uz[]" class="form-control {{ $errors->has('address_uz') ? "is-invalid":"" }}" value="{{ $address->address_uz }}" required>
                                            @if($errors->has('address_uz'))
                                                <span class="error invalid-feedback">{{ $errors->first('address_uz') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <label>@lang('admin.crud.address')(RU) ({{$i}})</label><label style="color: red">*</label>
                                            <input type="text" name="address_ru[]" class="form-control {{ $errors->has('address_ru') ? "is-invalid":"" }}" value="{{ $address->address_ru }}" required>
                                            @if($errors->has('address_ru'))
                                                <span class="error invalid-feedback">{{ $errors->first('address_ru') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <label>@lang('admin.crud.address')(ENG) ({{$i}})</label><label style="color: red">*</label>
                                            <input type="text" name="address_en[]" class="form-control {{ $errors->has('address_en') ? "is-invalid":"" }}" value="{{ $address->address_en }}" required>
                                            @if($errors->has('address_en'))
                                                <span class="error invalid-feedback">{{ $errors->first('address_en') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div id="showAddressInput">

                            </div>

                            <a id="add_address" class="btn btn-primary mb-2 form-control">+</a>


                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">@lang('admin.crud.update')</button>
                                <a href="{{ route('contacts.index') }}" class="btn btn-default float-left">@lang('admin.crud.cancel')</a>
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
        $(document).on("click","#add_address",function() {
            var inputs = $("#addressInputs").html();
            $("#showAddressInput").append(inputs);
        });
    </script>
@endsection
