@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bizning jamoa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">Home</a></li>
                        <li class="breadcrumb-item active">Bizning jamoa</li>
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
                        <h3 class="card-title">Qo'shish</h3>
                        <a href="{{ route('team.create') }}" class="btn btn-success btn-sm float-right">
                            <span class="fas fa-plus-circle"></span>
                            Qo'shish
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Data table -->
                        <table class="table table-bordered">
                            <tr>
                                <th>Fio</th>
                                <th>Lavozimi</th>
                                <th>Status</th>
                                <th>Rasm</th>
                                <th></th>
                            </tr>
                            @foreach($teams as $team)
                                <tr>
                                    <td>{{ $team->fio_uz }}</td>
                                    <td>{{ $team->position_uz }}</td>
                                    <td><button class="btn @if($team->status) btn-success @else btn-danger @endif" style="border-radius: 30px">@if($team->status) Active @else No active @endif</button></td>
                                    <td>
                                        <img src="{{ asset('uploads')}}/{{ $team->image  }}" class="img_admin">
                                    </td>
                                    <td>
                                        <form action="{{ route('team.destroy',$team->id) }}" method="POST">
                                            <a class="btn btn-info" href="{{ route('team.show',$team->id) }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-primary" href="{{ route('team.edit',$team->id) }}"><i class="fa fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" confirm="O'chirmoqchimisiz!" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                {{ $teams->links() }}
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
