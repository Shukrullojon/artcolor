@extends('layouts.admin')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.contact')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('contacts.index') }}">@lang('admin.sidebar.contact')</a></li>
                        <li class="breadcrumb-item active"></li>
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
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>@lang('admin.crud.title')(uz)</th>
                                <td>{{ $contact->title_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(ru)</th>
                                <td>{{ $contact->title_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(en)</th>
                                <td>{{ $contact->title_en }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.crud.phone')(uz)</th>
                                <td>{{ $contact->phone_1 }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.crud.phone')(uz)</th>
                                <td>{{ $contact->phone_2 }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.email')(ru)</th>
                                <td>{{ $contact->email }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.timetable')(en)</th>
                                <td>{{ $contact->timetable }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.crud.instagram')(en)</th>
                                <td>{{ $contact->instagram }}</td>
                            </tr><tr>
                                <th>@lang('admin.crud.facebook')(en)</th>
                                <td>{{ $contact->facebook }}</td>
                            </tr><tr>
                                <th>@lang('admin.crud.youtube')(en)</th>
                                <td>{{ $contact->youtube }}</td>
                            </tr>

                            @foreach($contact->addresses as $address)
                                <tr>
                                    <th>@lang('admin.crud.address')(uz)</th>
                                    <td>{{ $address->address_uz }}</td>
                                </tr>

                                <tr>
                                    <th>@lang('admin.crud.address')(ru)</th>
                                    <td>{{ $address->address_ru }}</td>
                                </tr>

                                <tr>
                                    <th>@lang('admin.crud.address')(en)</th>
                                    <td>{{ $address->address_en }}</td>
                                </tr>

                            @endforeach
                            <tr>
                                <th>@lang('admin.crud.image')</th>
                                <td>
                                    <img src="{{ asset("uploads/".$contact->logo) }}" class="img_admin">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
