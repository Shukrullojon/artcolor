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
                        <li class="breadcrumb-item active" ><a href="">@lang('front.sidebar.news')</a></li>
                    </ol>
                </nav>
                <h4 data-aos="fade-up" data-aos-duration="1500" >
                    {{ $header->title }}
                </h4>
                <div class="row align-items-center">
                    <div class="col-md-8" >
                        <p data-aos="fade-up" data-aos-duration="1500" >
                            {{ $header->info }}
                        </p>
                    </div>
                    <div class="col-md-4">
                        <div class="about-us-btn"data-aos="fade-up" data-aos-duration="1500" >
                            <a href="{{ $header->button_url }}">
                                <button>
                                    @lang('front.text.more')
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main -->
@endif


<!-- section blog -->
<div class="section-blog">
    <div class="container">
        <div class="section-blog-content">
            <div class="section-blog-header">
                <div class="blog-left" >
                    <p data-aos="fade-up" data-aos-duration="1500" >КАТЕГОРИИ</p>
                </div>
                <div class="blog-right" >
                    <ul data-aos="fade-up" data-aos-duration="1500" >
                        @if(count($categories))
                            @php $i=0 @endphp
                            @foreach($categories as $category)
                                <li class="tab-button @if($i ==0) active @endif" data-id="{{ $category->id }}">{{ $category->name }}</li>
                                @php $i++ @endphp
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>

            @if(count($categories))
            <!-- tab content -->
                @php $i=0 @endphp
                @foreach($categories as $category)
                    <div class="section-blog-item @if($i ==0) active @endif" id='{{ $category->id }}'>
                        <div class="section-blog-item-content">
                            @foreach($category->news as $new)
                                <a href="{{ route("blogitem",$new->id) }}">
                                    <div class="splide-card-item">
                                        <img src="{{ asset("uploads/".$new->image) }}"  alt="blog">
                                        <h5>{{ $new->title_uz }}</h5>
                                        <div class="date-content d-flex justify-content-between">
                                            <div class="date">{{ date("Y-m-d", strtotime($new->updated_at)) }}</div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @php $i++ @endphp
                @endforeach
            @endif
        </div>

    </div>
</div>
<!-- section blog -->

@endsection
