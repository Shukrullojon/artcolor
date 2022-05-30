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
                                <li class="breadcrumb-item"><a href="{{ route("system") }}">@lang('front.sidebar.System')</a></li>
                                <li class="breadcrumb-item active" ><a href="">{{ $header->title }}</a></li>
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

    @if(count($items))
        <!-- about -->
        <div class="about servise-item system-item-about">
            <div class="container">
                @php $i=0; @endphp
                @foreach($items as $item)
                    @if($i % 2 == 0)
                        <div class="about-content">
                            <div class="about-left">
                                <h1 data-aos="fade-up" data-aos-duration="1500">{{ $item->title }}</h1>
                                <p data-aos="fade-up" data-aos-duration="1500">
                                    {!! $item->info !!}
                                </p>
                            </div>
                            <div class="about-right">
                                <div class="about-img ">
                                    <img src="{{ asset("uploads/".$item->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="about-content about-page-content-2">
                            <div class="about-right">
                                <div class="about-img">
                                    <img src="{{ asset("uploads/".$item->image) }}" alt="">
                                </div>
                            </div>
                            <div class="about-left">
                                <h1 data-aos="fade-up" data-aos-duration="1500">{{ $item->title }}</h1>
                                {!! $item->info !!}
                            </div>
                        </div>
                    @endif
                    @php $i++ @endphp
                @endforeach
            </div>
        </div>
        <!-- about -->
    @endif

    <!-- pages About -->
    <div class="pagesAbout addPadding systemItemAbout">
        <div class="container">
            <h2 data-aos="fade-up" data-aos-duration="1500">@lang('front.text.System_products')</h2>
            @if(count($products))
                <div class="card-item-Page text-3d">
                    <div class="card-foot d-flex  flex-wrap gap-4">
                        @foreach($products as $product)
                            <div class="card-foot-item" data-id="1">
                                <div class="card-img text-center">
                                    <img src="{{ asset("uploads/".$product->image) }}" class="img-fluid" alt="">
                                    <div class="card-foot-item-shape pulse">
                                        <a href="{{ route("downloadsystem",$product->id) }}"><span>&#10230;</span></a>
                                    </div>
                                </div>
                                <h5>{{ $product->title }}</h5>
                                <p>
                                    <a href="{{ route("downloadsystem",$product->id) }}">{{ $product->origin }} ({{ number_format($product->mb/1024,"2",".","") }} МB)</a>
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif


            @if(count($silders))
                <h2 class="display-none" data-aos="fade-up" data-aos-duration="1500">@lang('front.text.Gallery_materials')</h2>
                <!-- swipper -->
                <div class="system-swiper-content">
                    <div class="swiper-container mySwiper">
                        <div class="swiper-wrapper">
                            @foreach($silders as $slider)
                                <div class="swiper-slide">
                                    <img src="{{ asset("uploads/".$slider->image) }}" alt="">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next pulse"></div>
                        <div class="swiper-button-prev pulse"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <!-- swipper -->
            @endif

            @if(!empty($about))
                <!-- pages About -->
                <div class="pagesAbout addPadding systemItemAbout">
                    <h3 data-aos="fade-up" data-aos-duration="1500">{{ $about->title }}</h3>
                    {{ $about->info }}
                </div>
                <!-- pages About -->
            @endif

        </div>
    </div>
    <!-- pages About -->

@endsection

@section('scripts')
    <!-- my js code -->
    <script>
        // scrool
        let mybutton = document.getElementById("btn-back-to-top");
        window.onscroll = function () {
            scrollFunction();
        };

        function scrollFunction() {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 20
            ) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        mybutton.addEventListener("click", backToTop);

        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
        // progress bar
        const showOnPx = 100;
        const pageProgressBar = document.querySelector(".progress-bar");

        const scrollContainer = () => {
            return document.documentElement || document.body;
        };

        document.addEventListener("scroll", () => {

            const scrolledPercentage =
                (scrollContainer().scrollTop /
                    (scrollContainer().scrollHeight - scrollContainer().clientHeight)) *
                100;

            pageProgressBar.style.width = `${scrolledPercentage}%`;


        });

        // filter

        function filter(){
            let effect = document.querySelector('#effect');
            let sostav = document.querySelector('#sostav');
            let ilova = document.querySelector('#ilova');
            let maqsad = document.querySelector('#maqsad');
            let murojat = document.querySelector('#murojat');


            if(effect , murojat , maqsad , ilova , sostav){

                let cardItem = document.querySelectorAll('.card-foot-item');

                cardItem.forEach(element => {
                    let cardId  = element.getAttribute('data-id');

                    if(!(cardId == effect.value)){
                        element.style.display = 'none'
                    }
                    if(!(cardId == murojat.value)){
                        element.style.display = 'none'
                    }
                    if(!(cardId == maqsad.value)){
                        element.style.display = 'none'
                    }
                    if(!(cardId == ilova.value)){
                        element.style.display = 'none'
                    }
                    if(!(cardId == sostav.value)){
                        element.style.display = 'none'
                    }
                    if(cardId == murojat.value){
                        element.style.display = 'block'
                    }
                    if(cardId == effect.value){
                        element.style.display = 'block'
                    }
                    if(cardId == maqsad.value){
                        element.style.display = 'block'
                    }
                    if(cardId == ilova.value){
                        element.style.display = 'block'
                    }
                    if(cardId == sostav.value){
                        element.style.display = 'block'
                    }
                });
            }
        }
    </script>

    <!-- swipper -->
    <script src="../js/swiper.min.js"></script>
    <!-- swipper -->

    <script>
        var swiper = new Swiper(".mySwiper", {
            pagination: {
                el: ".swiper-pagination",
                type: "fraction",
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            paginationClickable: false,
            loop: true,
            spaceBetween: 30,
            slideToClickedSlide: true ,
            autoplay: {
                delay: 1500,
            },
        });
    </script>


    <!-- my js code -->
@endsection
