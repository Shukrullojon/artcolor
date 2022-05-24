@extends('layouts.app')

@section('content')

    <!-- main -->
    <div class="mainPage" style="background-image: url('{{ asset('artColor/images/main-video-bg.png') }}')">
        <div class="mainPage-bg">
            <div class="container">
                <div class="mainPage-content">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route("index") }}">@lang('front.sidebar.home')</a></li>
                            <li class="breadcrumb-item active" ><a href="{{ route("product") }}">@lang('front.sidebar.product')</a></li>
                        </ol>
                    </nav>
                    <h4 data-aos="fade-up" data-aos-duration="1500">@lang('front.sidebar.product_category')</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- main -->

    @if(count($categories)>0)
        @php $i = 0 @endphp
        @foreach($categories as $category)
            @if($i % 2 == 0)
                @if($category->colls == 1)
                    <!-- section 1 -->
                    <div class="section-1 text-white">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <h3 data-aos="fade-up" data-aos-duration="1500">{!! $category->title !!}</h3>
                                    <p data-aos="fade-up" data-aos-duration="1500">
                                        {!! $category->info !!}
                                    </p>

                                    <div class="product-Ul-1 d-flex justify-content-md-between" data-aos="fade-up"  data-aos-duration="1500">
                                        <div class="product-ul-left">
                                            <ul>
                                                @foreach($category->items as $item)
                                                    <li><p>{{ $item->title }}</p></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="allBtn-block">
                                            <a href="{{ route("subcategory",$category->id) }}">
                                                <button class="allBtn yellow">
                                                    @lang('front.text.more')
                                                </button>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-8 col-md-6">
                                    <img src="{{ asset("uploads/".$category->image) }}" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- section 1-->
                @elseif($category->colls == 2)
                    <!-- section 2 -->
                    <div class="section section-2">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <h3 data-aos="fade-up" data-aos-duration="1500">{!! $category->title !!}</h3>
                                    <p data-aos="fade-up" data-aos-duration="1500">
                                        {!! $category->info !!}
                                    </p>

                                    <div class="product-ul-left" data-aos="fade-up"  data-aos-duration="1500">
                                        <ul>
                                            @foreach($category->items as $item)
                                                <li><p>{{ $item->title }}</p></li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="allBtn-block">
                                        <a href="{{ route("subcategory",$category->id) }}">
                                            <button class="allBtn">
                                                @lang('front.text.more')
                                            </button>
                                        </a>
                                    </div>

                                </div>
                                <div class="col-lg-8 col-md-6">
                                    <img src="{{ asset("uploads/".$category->image) }}"  alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- section 2 -->
                @else
                    <!-- section  -->
                    <div class="section">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <h3 data-aos="fade-up" data-aos-duration="1500">{!! $category->title !!}</h3>
                                    <p data-aos="fade-up" data-aos-duration="1500">
                                        {!! $category->info !!}
                                    </p>
                                    <div class="allBtn-block">
                                        <a href="{{ route("subcategory",$category->id) }}">
                                            <button class="allBtn">
                                                @lang('front.text.more')
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6">
                                    <img src="{{ asset("uploads/".$category->image) }}"  alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- section  -->
                @endif
            @else
                @if($category->colls == 1)
                    <!-- section 1 -->
                    <div class="section-1 text-white">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-md-6">
                                    <img src="{{ asset("uploads/".$category->image) }}" class="img-fluid" alt="">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h3 data-aos="fade-up" data-aos-duration="1500">{!! $category->title !!}</h3>
                                    <p data-aos="fade-up" data-aos-duration="1500">
                                        {!! $category->info !!}
                                    </p>

                                    <div class="product-Ul-1 d-flex justify-content-md-between" data-aos="fade-up"  data-aos-duration="1500">
                                        <div class="product-ul-left">
                                            <ul>
                                                @foreach($category->items as $item)
                                                    <li><p>{{ $item->title }}</p></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="allBtn-block">
                                            <a href="{{ route("subcategory",$category->id) }}">
                                                <button class="allBtn yellow">
                                                    @lang('front.text.more')
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- section 1-->
                @elseif($category->colls == 2)
                    <!-- section 2 -->
                    <div class="section section-2">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-md-6">
                                    <img src="{{ asset("uploads/".$category->image) }}"  alt="">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h3 data-aos="fade-up" data-aos-duration="1500">{!! $category->title !!}</h3>
                                    <p data-aos="fade-up" data-aos-duration="1500">
                                        {!! $category->info !!}
                                    </p>

                                    <div class="product-ul-left" data-aos="fade-up"  data-aos-duration="1500">
                                        <ul>
                                            @foreach($category->items as $item)
                                                <li><p>{{ $item->title }}</p></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="allBtn-block">
                                        <a href="{{ route("subcategory",$category->id) }}">
                                            <button class="allBtn">
                                                @lang('front.text.more')
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- section 2 -->
                @else
                    <!-- section  -->
                    <div class="section">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-md-6">
                                    <img src="{{ asset("uploads/".$category->image) }}"  alt="">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h3 data-aos="fade-up" data-aos-duration="1500">{!! $category->title !!}</h3>
                                    <p data-aos="fade-up" data-aos-duration="1500">
                                        {!! $category->info !!}
                                    </p>
                                    <div class="allBtn-block">
                                        <a href="{{ route("subcategory",$category->id) }}">
                                            <button class="allBtn">
                                                @lang('front.text.more')
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- section  -->
                @endif
            @endif
            @php $i++ @endphp
        @endforeach
    @endif

    @if(!empty($cattext))
        <!-- pages About -->
        <div class="pagesAbout">
            <div class="container">

                <h3 data-aos="fade-up" data-aos-duration="1500">{{ $cattext->title }}</h3>

                {!! $cattext->info !!}
            </div>
        </div>
        <!-- pages About -->
    @endif
@endsection
