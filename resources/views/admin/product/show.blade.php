@extends('layouts.admin')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('admin.sidebar.product')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminIndex') }}">@lang('admin.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">@lang('admin.sidebar.product')</a></li>
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
                                <th>@lang('admin.crud.category')</th>
                                <td>@if(!empty($product->category)){{ $product->category->title_uz }} @endif</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.sidebar.product_filter')</th>
                                <td>@if(!empty($product->filter)){{ $product->filter->title_uz }} @endif</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(uz)</th>
                                <td>{{ $product->title_uz }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(ru)</th>
                                <td>{{ $product->title_ru }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.title')(en)</th>
                                <td>{{ $product->title_en }}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.info')(uz)</th>
                                <td>{!!  $product->info_uz !!}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.info')(ru)</th>
                                <td>{!! $product->info_ru !!}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.info')(en)</th>
                                <td>{!! $product->info_en !!}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.application')(uz)</th>
                                <td>{!! $product->application_uz !!}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.application')(ru)</th>
                                <td>{!! $product->application_ru !!}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.application')(en)</th>
                                <td>{!! $product->application_en !!}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.compound')(uz)</th>
                                <td>{!! $product->compound_uz !!}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.compound')(ru)</th>
                                <td>{!! $product->compound_ru !!}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.compound')(en)</th>
                                <td>{!! $product->compound_en !!}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.consumption')(en)</th>
                                <td>{!! $product->consumption_uz !!}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.consumption')(en)</th>
                                <td>{!! $product->consumption_ru !!}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.consumption')(en)</th>
                                <td>{!! $product->consumption_en !!}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.peculiarit')(uz)</th>
                                <td>{!! $product->peculiarit_uz !!}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.peculiarit')(ru)</th>
                                <td>{!! $product->peculiarit_ru !!}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.peculiarit')(en)</th>
                                <td>{!! $product->peculiarit_en !!}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.accordion_title')(uz)</th>
                                <td>{!! $product->accordion_title_uz !!}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.accordion_title')(ru)</th>
                                <td>{!! $product->accordion_title_ru !!}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.accordion_title')(en)</th>
                                <td>{!! $product->accordion_title_en !!}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.accordion_info')(uz)</th>
                                <td>{!! $product->accordion_info_uz !!}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.accordion_info')(ru)</th>
                                <td>{!! $product->accordion_info_ru !!}</td>
                            </tr>

                            <tr>
                                <th>@lang('admin.crud.accordion_info')(ru)</th>
                                <td>{!! $product->accordion_info_ru !!}</td>
                            </tr>




                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
