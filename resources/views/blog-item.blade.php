@extends('layouts.app_second')

@section('content')
    <!-- main -->
    <div class="main py-5">
        <div class="container">
            <div class="main-content">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route("index") }}">@lang('front.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route("blog") }}">@lang('front.sidebar.news')</a></li>
                        <li class="breadcrumb-item active" ><a href="">{{ $new->title ?? "" }}</a></li>
                    </ol>
                </nav>
                <h2 data-aos="fade-up" data-aos-duration="1500">
                    {{ $new->title ?? "" }}
                </h2>

            </div>
        </div>
    </div>
    <!-- main -->

    <!-- blog item - content -->
    @if(!empty($new))
        <div class="blog-item-cursor">
            <div class="container">
                <div class="row  text-center align-items-center">
                    <div class="col-md-5 py-2">
                        <p>
                            {{ date("Y-m-d",strtotime($new->created_at)) }} | <span>@if($new->type == 1) @lang('front.text.new') @else @lang('front.text.blog') @endif</span>
                        </p>
                    </div>
                    <div class="col-md-2 blog-icons">
                        <a href="{{ route("randblog") }}">
                            <span>&#10229;</span>
                        </a>
                        <a href="#">
                            <img src="{{ asset("artColor/images/grid.png") }}" alt="">
                        </a>
                        <a href="{{ route("randblog") }}">
                            <span> &#10230;</span>
                        </a>
                    </div>
                    <div class="col-md-5 py-2 blog-header-img">
                        <p>
                            @lang('front.text.share'):
                            <a href="https://telegram.me/share/url?url={{ url()->current() }}">
                                <img src="{{ asset("artColor/images/telegram.png") }}" alt="">
                            </a>
                            <a href="https://www.instagram.com/sharer.php?u={{url()->current()}}">
                                <img src="{{ asset("artColor/images/instagram.png") }}" alt="">
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}">
                                <img src="{{ asset("artColor/images/facebook.png") }}" alt="">
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}">
                                <img src="{{ asset("artColor/images/twitter.png") }}" alt="">
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <!-- blog item - content-->
    @endif

    <!-- blog item about -->
    <div class="blog-item-about">
        <div class="container-fluid">
            <h2 data-aos="fade-up" data-aos-duration="1500">{{ $new->title ?? "" }}</h2>
            <div class="row py-4">
                <div class="col-6" >
                    @if(!empty($new))<p data-aos="fade-up" data-aos-duration="1500">@if($new->type == 1) @lang('front.text.new') @else @lang('front.text.blog') @endif</p>@endif
                </div>
                <div class="col-6 text-end">
                    @if(!empty($new))<p data-aos="fade-up" data-aos-duration="2000">{{ date("Y-m-d", strtotime($new->created_at)) }}</p>@endif
                </div>
            </div>

            <div class="blog-item-about-img">
                @if(!empty($new))<img src="{{ asset("uploads/".$new->image) }}" alt="">@endif
            </div>

            <div class="about-item-social row">
                <div class="col-md-6 col-8">
                    <div class="d-flex align-items-center gap-3">
                        <div data-aos="fade-up" data-aos-duration="1500">
                            <p>@lang('front.text.share'):</p>
                        </div>
                        <div data-aos="fade-up" data-aos-duration="1500">
                            <a href="https://telegram.me/share/url?url={{ url()->current() }}">
                                <img src="{{ asset("artColor/images/telegram.png") }}" alt="">
                            </a>
                            <a href="https://www.instagram.com/sharer.php?u={{url()->current()}}">
                                <img src="{{ asset("artColor/images/instagram.png") }}" alt="">
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}">
                                <img src="{{ asset("artColor/images/facebook.png") }}" alt="">
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}">
                                <img src="{{ asset("artColor/images/twitter.png") }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-4" data-aos="fade-up" data-aos-duration="1500">
                    <a href="#" onclick="window.print()">
                        <img src="{{ asset("artColor/images/print.png") }}" alt="">
                        <span>@lang('front.text.print')</span>
                    </a>
                </div>
            </div>

            <div class="blog-item-text">
                {{ $new->text ?? "" }}
            </div>

        </div>
    </div>
    <!-- blog item about -->

    <!-- blog -->
    <div class="blog ">
        <div class="container">

            <div class="row">
                <div class="col-sm-6 blog-texts">
                    <h4 class="text-capitalize" data-aos="fade-up" data-aos-duration="1500">@lang('front.text.news_and_blog')</h4>
                </div>
                <div class="col-sm-6 blog-btns">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
                <section class="swiper">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($rand as $r)
                                <div class="swiper-slide">
                                    <a href="{{ route("blogitem",$r->id) }}">
                                        <div class="splide-card-item">
                                            <img src="{{ asset("uploads/".$r->image) }}"  alt="">
                                            <h5>{{ $r->title }}</h5>
                                            <div class="date-content d-flex justify-content-between">
                                                <div class="date">{{ date("Y-m-d",strtotime($r->created_at)) }}</div>
                                                <div class="blog-text">@if($new->type == 1) @lang('front.text.new') @else @lang('front.text.blog') @endif</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
        </div>
    </div>
    <!-- blog -->

@endsection

@section('scripts')
    <script src="{{ asset("artColor/js/swiper.min.js") }}"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            slidesPerView:3,
            centeredSlides: false,
            paginationClickable: true,
            loop: false,
            spaceBetween: 0,
            slideToClickedSlide: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {


                300: {
                    slidesPerView: 1,
                    spaceBetween: 10
                },

                550: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },

                1000: {
                    slidesPerView: 3,
                    spaceBetween: 10
                }
            }
        });
    </script>

    <!-- swipper js -->

    <!-- my js -->
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
    </script>
    <!-- my js -->
@endsection
