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
                        <li class="breadcrumb-item"><a href="{{ route('team.index') }}">Bizning jamoa</a></li>
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
                                <th>Fio(uz)</th>
                                <td>{{ $team->fio_uz }}</td>
                            </tr>

                            <tr>
                                <th>Fio(ru)</th>
                                <td>{{ $team->fio_ru }}</td>
                            </tr>

                            <tr>
                                <th>Fio(en)</th>
                                <td>{{ $team->fio_en }}</td>
                            </tr>

                            <tr>
                                <th>Status</th>
                                <td>
                                    <button class="btn @if($team->status) btn-success @else btn-danger @endif" style="border-radius: 30px">@if($team->status) Active @else No active @endif</button>
                                </td>
                            </tr>

                            <tr>
                                <th>Lavozimi(uz)</th>
                                <td>{{ $team->position_uz }}</td>
                            </tr>

                            <tr>
                                <th>Lavozimi(ru)</th>
                                <td>{{ $team->position_ru }}</td>
                            </tr>

                            <tr>
                                <th>Lavozimi(en)</th>
                                <td>{{ $team->position_en }}</td>
                            </tr>

                            <tr>
                                <th>Rasm</th>
                                <td>
                                    <img src="{{ asset("uploads/".$team->image) }}" class="img_admin">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
