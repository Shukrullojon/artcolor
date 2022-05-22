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
                        <li class="breadcrumb-item active">@lang('admin.sidebar.contact')</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@lang('admin.crud.add')</h3>
                        <a href="{{ route('contacts.create') }}" class="btn btn-success btn-sm float-right">
                            <span class="fas fa-plus-circle"></span>
                            @lang('admin.crud.add')
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Data table -->
                        <table class="table table-bordered">
                            <tr>
                                <th>@lang('admin.crud.title')</th>
                                <th>@lang('admin.crud.phone')</th>
                                    <th>@lang('admin.crud.email')</th>
                                    <th>@lang('admin.crud.address')(1)</th>
                                    <th>@lang('admin.crud.address')(2)</th>
                                <th>@lang('admin.crud.logo')</th>
                                <th></th>
                            </tr>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->title_uz }}</td>
                                    <td>{{ $contact->phone_1 }}</td>
                                    <td>{{ $contact->email }}</td>
                                         <td>{{ $contact->first()->address_uz }}</td>

                                    <td>
                                        <img src="{{ asset('uploads')}}/{{ $contact->logo  }}" class="img_admin">
                                    </td>
                                    <td>
                                        <form action="{{ route('contacts.destroy',$contact->id) }}" method="POST">
                                            <a class="btn btn-info" href="{{ route('contacts.show',$contact->id) }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-primary" href="{{ route('contacts.edit',$contact->id) }}"><i class="fa fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                {{ $contacts->links() }}
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
