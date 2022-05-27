@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.service_header')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item active">@lang('admin.sidebar.service_header')</li>
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
                        <a href="{{ route('service_headers.create') }}" class="btn btn-success btn-sm float-right">
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
                                <th>@lang('admin.crud.button')</th>
                                <th>@lang('admin.crud.service')</th>
                                <th>@lang('admin.crud.button_url')</th>
                                <th></th>
                            </tr>
                            @foreach($serviceItemHeaders as $serviceItemHeader)
                                <tr>
                                    <td>{{ $serviceItemHeader->title_uz }}</td>
                                    <td>{{ $serviceItemHeader->button_uz }}</td>
                                    @if(!empty($serviceItemHeader->service()))
                                        <td>{{ $serviceItemHeader->service->title_uz }}</td>
                                    @endif
                                    <td>{{ $serviceItemHeader->button_url }}</td>

                                    <td>
                                        <form action="{{ route('service_headers.destroy',$serviceItemHeader->id) }}" method="POST">
                                            <a class="btn btn-info" href="{{ route('service_headers.show',$serviceItemHeader->id) }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-primary" href="{{ route('service_headers.edit',$serviceItemHeader->id) }}"><i class="fa fa-edit"></i></a>
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
                {{ $serviceItemHeaders->links() }}
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
