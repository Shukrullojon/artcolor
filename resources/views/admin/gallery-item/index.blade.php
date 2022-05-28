@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.gallery_item')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item active">@lang('admin.sidebar.gallery_item')</li>
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
                        <a href="{{ route('galleryitem.create') }}" class="btn btn-success btn-sm float-right">
                            <span class="fas fa-plus-circle"></span>
                            @lang('admin.crud.add')
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Data table -->
                        <table class="table table-bordered">
                            <tr>
                                <th>@lang('admin.crud.gallery')</th>
                                <th>@lang('admin.crud.title')</th>
                                <th>@lang('admin.crud.image')</th>
                                <th></th>
                            </tr>
                            @foreach($items as $item)
                                <tr>
                                    <td>@if(!empty($item->category)){{ $item->category->title_uz }}@endif</td>
                                    <td>{{ $item->title_uz }}</td>
                                    <td>
                                        <img src="{{ asset('uploads')}}/{{ $item->image  }}" class="img_admin">
                                    </td>
                                    <td>
                                        <form action="{{ route('galleryitem.destroy',$item->id) }}" method="POST">
                                            <a class="btn btn-info" href="{{ route('galleryitem.show',$item->id) }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-primary" href="{{ route('galleryitem.edit',$item->id) }}"><i class="fa fa-edit"></i></a>
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
                {{ $items->links() }}
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
