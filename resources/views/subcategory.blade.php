@extends('layouts.app')

@section('content')

@if(!empty($subheader))
    <!-- main -->
    <div class="mainPage" style="background-image: url('{{ asset('uploads/'.$subheader->image) }}');">
        <div class="mainPage-bg">
            <div class="container">
                <div class="mainPage-content">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route("index") }}">@lang('front.sidebar.home')</a></li>
                            <li class="breadcrumb-item active" ><a href="">{{ $category->title }}</a></li>
                        </ol>
                    </nav>
                    <h4 data-aos="fade-up" data-aos-duration="1500">
                        {{ $subheader->title }}
                    </h4>
                    <p data-aos="fade-up" data-aos-duration="1500">
                        {{ $subheader->info }}
                    </p>
                </div>

            </div>
        </div>
    </div>
    <!-- main -->
@endif


@if(count($subcategory)>0)
<!-- section 1 -->
<div class="section-1 kraska">
    <div class="container">
        <div class="section-1-content">
            @foreach($subcategory as $sub)
                <div class="section-item">
                    <a href="{{ route("carditem",$sub->id) }}">
                        <div class="section-1-item">
                            <div class="section-1-img">
                                <img src="{{ asset("uploads/".$sub->image) }}" class="section-1-item-img" alt="">
                                <div class="section-1-about">
                                    <h3>
                                        {{ $sub->title }}
                                    </h3>
                                    <p>
                                        {{ $sub->info }}
                                    </p>
                                </div>
                                <div class="section-1-link">
                                    <a href="{{ route("carditem",$sub->id) }}">
                                        <span>{{ $sub->count }} @lang('front.text.product')</span>
                                        <img src="{{ asset('artColor/images/right-vector.png')}}" alt="">
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

