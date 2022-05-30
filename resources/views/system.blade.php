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
                                <li class="breadcrumb-item"><a href="{{ route("index") }}">@lang('front.sidebar.home')</a></li>
                                <li class="breadcrumb-item active" ><a href="">{{ $header->title }}</a></li>
                            </ol>
                        </nav>
                        <h4 data-aos="fade-up" data-aos-duration="1500">
                            {{ $header->title }}
                        </h4>
                    </div>

                </div>
            </div>
        </div>
        <!-- main -->
    @endif


    @if(count($systems))
        <!-- section 1 -->
        <div class="section-1 kraska downloadmaterial system">
            <div class="container">

                <div class="section-item-left">
                    <h4>
                        @lang('front.text.Categories_of_systems')
                    </h4>
                </div>

                <div class="section-1-content">
                    @foreach($systems as $system)
                        <div class="section-item">
                            <a href="system-item.html">
                                <div class="section-1-item">
                                    <div class="section-1-img">
                                        <img src="{{ asset("uploads/".$system->image) }}" class="section-1-item-img" alt="">
                                        <div class="section-1-about">
                                            <h3>
                                                {{ $system->title }}
                                            </h3>
                                            <p>
                                                {{ $system->info }}
                                            </p>
                                        </div>
                                        <div class="section-1-link">
                                            <a href="{{ route("systemitem",$system->id) }}">
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

            </div>
        </div>
        <!-- section 1 -->
    @endif

@endsection
