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
                        <li class="breadcrumb-item active">Qo'shish</li>
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
                        <h3 class="card-title">Qo'shish</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('agents.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Nomi</label>
                                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? "is-invalid":"" }}" value="{{ old('name') }}" required>
                                        @if($errors->has('name'))
                                            <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Telefon</label>
                                        <input type="text" name="phone" class="form-control {{ $errors->has('phone') ? "is-invalid":"" }}" value="{{ old('phone') }}" required>
                                        @if($errors->has('phone'))
                                            <span class="error invalid-feedback">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Code</label>
                                        <input type="text" name="code" class="form-control {{ $errors->has('code') ? "is-invalid":"" }}" value="{{ old('code') }}" required>
                                        @if($errors->has('code'))
                                            <span class="error invalid-feedback">{{ $errors->first('code') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">Saqlash</button>
                                <a href="{{ route('products.index') }}" class="btn btn-default float-left">Bekor qilish</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
