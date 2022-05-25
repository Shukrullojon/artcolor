@extends('layouts.app')

@section('content')

@if(!empty($serviceheader))
    <!-- main -->
    <div class="mainPage" style="background-image: url('{{ asset("uploads/".$serviceheader->image) }}');">
        <div class="mainPage-bg">
            <div class="container">

                <div class="mainPage-content">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route("index") }}">@lang('front.sidebar.home')</a></li>
                            <li class="breadcrumb-item active" ><a href="{{ route("service") }}">@lang('front.sidebar.service')</a></li>
                        </ol>
                    </nav>
                    <h4 data-aos="fade-up" data-aos-duration="1500">
                        {{ $serviceheader->title }}
                    </h4>
                    <p>
                        {{ $serviceheader->info }}
                    </p>
                </div>

            </div>
        </div>
    </div>
    <!-- main -->
@endif

@if(count($services))
<!-- section 1 -->
<div class="section-1 kraska">
    <div class="container">
        <div class="section-1-content">
            @foreach($services as $service)
                <div class="section-item">
                    <a href="{{ route("serviceitem",$service->id) }}">
                        <div class="section-1-item">
                            <div class="section-1-img">
                                <img src="{{ asset("uploads/".$service->image) }}" class="section-1-item-img" alt="">
                                <div class="section-1-about">
                                    <h3>
                                        {{ $service->title }}
                                    </h3>
                                </div>
                                <div class="section-1-link">
                                    <a href="{{ route("serviceitem",$service->id) }}">
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
