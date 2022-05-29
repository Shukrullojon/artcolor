@extends('layouts.app_second')

@section('content')
    @if(!empty($header))
        <!-- main -->
        <div class="main py-5">
            <div class="container">
                <div class="main-content">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route("index") }}">@lang('front.sidebar.home')</a></li>
                            <li class="breadcrumb-item"><a href="{{ route("gallery")}}">@lang('front.sidebar.gallery')</a></li>
                            <li class="breadcrumb-item active" ><a href="">@lang('front.sidebar.portfolio')</a></li>
                        </ol>
                    </nav>
                    <h4 data-aos="fade-up" data-aos-duration="1500">
                        {{ $header->title }}
                    </h4>
                </div>
            </div>
        </div>
        <!-- main -->
    @endif

    <div class="gallery-item-bg portfolio-bg">
        <div class="container">
            @if(!empty($about))
                <div class="portfolio-header">
                    {{ $about->info }}
                    <p data-aos="fade-up" data-aos-duration="1500">
                        {{ $about->social }}: <span><a href="{{ $about->link }}">{{ $about->link }}</a></span>
                    </p>
                </div>
            @endif

            @if(count($images))
                <div class="portfolio-body">
                    <div class="row">
                        @foreach($images as $image)
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <img src="{{ asset("uploads/".$image->image) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if(count($characters))
                <div class="portfolio-about">
                    @foreach($characters as $character)
                        <div class="portfolio-about-item">
                            <h6>{{ $character->title }}</h6>
                            <p>
                                {{ $character->info }}
                            </p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    @if(count($products))
        <!-- pages About -->
        <div class="pagesAbout addPadding portfolioAbout">
            <div class="container">
                <h2>@lang('front.text.see_also')</h2>
                <div class="card-item-Page text-3d">
                    <div class="card-foot d-flex justify-content-lg-between justify-content-md-around justify-content-sm-around justify-content-around align-items-center flex-wrap gap-4">
                        @foreach($products as $product)
                            <div class="card-foot-item">
                                <div class="card-img text-center">
                                    <img src="{{ asset("uploads/".$product->image) }}" class="img-fluid" alt="">
                                    <div class="card-foot-item-shape pulse">
                                        <a href="{{ route("portfoliodownload",$product->id) }}"><span>&#10230;</span></a>
                                    </div>
                                </div>
                                <h5>{{ $product->title }}</h5>
                                <p>
                                    <a href="{{ route("portfoliodownload",$product->id) }}">{{ $product->origin }} ({{ number_format($product->mb/1024,2,'.','') }} МB)</a>
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
        <!-- pages About -->
    @endif

@endsection
