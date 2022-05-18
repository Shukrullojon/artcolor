@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.slider')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item active">@lang('admin.sidebar.slider')</li>
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
                        <a href="{{ route('slider.create') }}" class="btn btn-success btn-sm float-right">
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
                                <th>@lang('admin.crud.short_title')</th>
                                <th>@lang('admin.crud.info')</th>
                                <th>@lang('admin.crud.status')</th>
                                <th>@lang('admin.crud.image')</th>
                                <th></th>
                            </tr>
                            @foreach($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->title_uz }}</td>
                                    <td>{{ $slider->title_short_uz }}</td>
                                    <td>{{ $slider->info_uz }}</td>
                                    <td><button class="btn @if($slider->status) btn-success @else btn-danger @endif" style="border-radius: 30px">@if($slider->status) @lang('admin.crud.active') @else @lang('admin.crud.no_active') @endif</button></td>
                                    <td>
                                        <img src="{{ asset('uploads')}}/{{ $slider->image_right  }}" class="img_admin">
                                    </td>
                                    <td>
                                        <form action="{{ route('slider.destroy',$slider->id) }}" method="POST">
                                            <a class="btn btn-info" href="{{ route('slider.show',$slider->id) }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-primary" href="{{ route('slider.edit',$slider->id) }}"><i class="fa fa-edit"></i></a>
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
                {{ $sliders->links() }}
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
