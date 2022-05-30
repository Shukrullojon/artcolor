@extends('layouts.app')

@section('content')
    @if(!empty($header))
        <!-- main -->
        <div class="mainPage" style="background-image: url('{{ asset("uploads/".$header->image) }}');">
            <div class="mainPage-bg">
                <div class="container">

                    <div class="mainPage-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route("home") }}">@lang('front.sidebar.home')</a></li>
                                <li class="breadcrumb-item active" ><a href="{{ route("download") }}">@lang('front.sidebar.download')</a></li>
                            </ol>
                        </nav>
                        <h4 data-aos="fade-up" data-aos-duration="1500">
                            {{ $header->title }}
                        </h4>
                        <p data-aos="fade-up" data-aos-duration="1500">
                            {{ $header->info }}
                        </p>
                    </div>

                </div>
            </div>
        </div>
        <!-- main -->
    @endif

    <!-- section 1 -->
    <div class="section-1 kraska downloadmaterial">
        <div class="container">
            @if(!empty($about))
                <div class="section-item-left">
                    <h4>
                        {{ $about->title }}
                    </h4>
                    <p>
                        {{ $about->info }}
                    </p>
                </div>
            @endif

            @if(count($categories))
                <div class="section-1-content">
                    @foreach($categories as $category)
                        <div class="section-item">
                            <a href="{{ route("downloaditem",$category->id) }}">
                                <div class="section-1-item">
                                    <div class="section-1-img">
                                        <img src="{{ asset("uploads/".$category->image) }}" class="section-1-item-img" alt="">
                                        <div class="section-1-about">
                                            <h3>
                                                {{ $category->title }}
                                            </h3>
                                            <p>
                                                {{ $category->info }}
                                            </p>
                                        </div>
                                        <div class="section-1-link">
                                            <a href="{{ route("downloaditem",$category->id) }}">
                                                <span>@lang('front.text.more')</span>
                                                <img src="{{ asset("artColor/images/right-vector.png") }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif

            @if(!empty($info))
                <div class="download-material-about" data-aos="fade-up"  data-aos-duration="1500">
                    <!-- pages About -->
                    <div class="pagesAbout">
                        <div class="container">

                            <h3>{{ $info->title }}</h3>

                            {!! $info->info !!}

                        </div>
                    </div>
                    <!-- pages About -->
                </div>
            @endif
        </div>
    </div>
    <!-- section 1 -->

@endsection
