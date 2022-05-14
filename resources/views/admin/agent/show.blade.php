@extends('layouts.admin')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Agent</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('agents.index') }}">Agentlar</a></li>
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
                    <div class="card-header">

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td>Nomi</td>
                                <td>{{ $agent->name }}</td>
                            </tr>

                            <tr>
                                <td>Telefoni</td>
                                <td>{{ $agent->phone }}</td>
                            </tr>

                            <tr>
                                <td>Code</td>
                                <td>{{ $agent->code }}</td>
                            </tr>
                        </table>
                        <h3>Agent kodi orqali ro'yhatdan o'tgan foydalanuvchilar</h3>
                        @php
                            $users = \App\Models\User::where('from_id',$agent->code)->get();
                        @endphp
                        <table class="table table-bordered">
                            <tr>
                                <td>Nomi</td>
                                <td>Telefon raqami</td>
                                <td>Tug'ilgan kuni</td>
                                <td>Qayerdan kelgan</td>
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->happy }}</td>
                                    <td>{{ $user->from }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
