@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Agentlar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Agentlar</li>
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
                        <a href="{{ route('agents.create') }}" class="btn btn-success btn-sm float-right">
                            <span class="fas fa-plus-circle"></span>
                            Qo'shish
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Data table -->
                        <table class="table table-bordered">
                            <tr>
                                <th>Nomi</th>
                                <th>Phone</th>
                                <th>Code</th>
                                <th></th>
                            </tr>
                            @foreach($agents as $agent)
                                <tr>
                                    <td>{{ $agent->name }}</td>
                                    <td>{{ $agent->phone }}</td>
                                    <td>{{ $agent->code }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a style="margin-left: 10px" href="{{route('agents.show',$agent->id)}}" class="float-left fa fa-eye btn btn-success btn-sm" ></a>

                                            <form class="delete" onsubmit="return confirm('O\'chirmoqchimisiz?')" action="{{ route('agents.destroy',$agent->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {!! method_field('delete') !!}
                                                <button style="margin-left: 10px" type="submit"  class="fa fa-trash-o btn btn-danger btn-sm">
                                                    <span class="fa fa-trash"></span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                {{ $agents->links() }}
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
