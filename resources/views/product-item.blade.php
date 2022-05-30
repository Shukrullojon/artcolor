<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Muhammadsolih">
    <title>ArtColor DECOR WAX</title>

    <!-- aos animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- aos animation -->

    <!-- logo icon -->
    <link rel="icon" href="{{ asset('artColor/images/card-item-1.png')}}">
    <!-- logo icon -->

    <!-- fancy -->
    <link rel="stylesheet" href="{{ asset('artColor/style/photoswipe.css')}}">
    <!-- fancy -->

    <!-- swiper css -->
    <link rel="stylesheet" href="{{ asset('artColor/style/swiper.min.css')}}">
    <!-- swiper css -->

    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('artColor/style/bootstrap.min.css')}}">
    <!-- bootstrap css -->

    <!-- my style code -->
    <link rel="stylesheet" href="{{ asset('artColor/style/style.css')}}">
    <link rel="stylesheet" href="{{ asset('artColor/style/media.css')}}">
    <!-- my style code -->
</head>
<body class="Navbar-Static">

<!-- progress bar -->
<div class="progress-bar"></div>
<!-- progress bar -->

<!-- btn -->
<button
    type="button"
    class="toTop pulse"
    id="btn-back-to-top"
>
    <i class="fas fa-arrow-up"></i>
</button>
<!-- btn -->

<!-- offcancas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel"></h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul>
            <li>
                <a href="{{ url("/") }}"  @if(Route::currentRouteName() == "index") class="active" @endif>@lang('front.sidebar.home')</a>
            </li>
            <li>
                <a href="{{ route("product") }}" @if(Route::currentRouteName() == "product") class="active" @endif>@lang('front.sidebar.product')</a>
            </li>
            <li>
                <a href="{{ route("about") }}" @if(Route::currentRouteName() == "about") class="active" @endif>@lang('front.sidebar.about_company')</a>
            </li>
            <li>
                <a href="{{ route("contact") }}" @if(Route::currentRouteName() == "contact") class="active" @endif>@lang('front.sidebar.contact')</a>
            </li>
            @php
                $contact = \App\Models\Contact::latest()->first();
            @endphp
        </ul>
        <div class="navbar-phone">
            <a href="tel:{{ $contact->phone_1 ?? ""}}">
                <i class="fas fa-phone"></i>
                <span>@if(!empty($contact->phone_1)){{ $contact->phone_1 }}@endif</span>
            </a>
            <a href="tel:{{ $contact->phone_2 ?? ""}}">
                <i class="fas fa-phone"></i>
                <span>{{ $contact->phone_2 ?? ""}}</span>
            </a>
        </div>
        <div class="search">
            <i class="fas fa-search"></i>

            <div class="dropdown">
                @php $lang = session('locale') @endphp
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    @if(strlen($lang)>2) Ru @endif
                    @if($lang == "uz") Uz @endif
                    @if($lang == "ru") Ru @endif
                    @if($lang == "en") En @endif
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    @if($lang != "uz") <li><a class="dropdown-item" href="/language/uz">Uz</a></li> @endif
                    @if($lang != "ru" and strlen($lang) == 2) <li><a class="dropdown-item" href="/language/ru">Ru</a></li> @endif
                    @if($lang != "en") <li><a class="dropdown-item" href="/language/en">En</a></li> @endif
                </ul>
            </div>

        </div>
    </div>
</div>
<!-- offcancas -->

<!-- navbar -->
<div class="navMenu" >
    <div class="container">
        <div class="content">
            <div class="navbar-left">
                <a href="{{ url("/") }}">
                    @if(!empty($contact->logo))
                        <img src="{{ asset('uploads/'.$contact->logo)}}" alt="">
                    @endif
                </a>
                <ul>
                    <li>
                        <a href="{{ url("/") }}" @if(Route::currentRouteName() == "index") class="active" @endif>@lang('front.sidebar.home')</a>
                    </li>
                    <li>
                        <a href="{{ route("product") }}" @if(Route::currentRouteName() == "product") class="active" @endif>@lang('front.sidebar.product')</a>
                    </li>
                    <li>
                        <a href="{{ route("about") }}" @if(Route::currentRouteName() == "about") class="active" @endif>@lang('front.sidebar.about_company')</a>
                    </li>
                    <li>
                        <a href="{{ route("contact") }}" @if(Route::currentRouteName() == "contact") class="active" @endif>@lang('front.sidebar.contact')</a>
                    </li>
                </ul>
            </div>
            <div class="navbar-right">
                <div class="navbar-phone">
                    <a href="tel:{{ $contact->phone_1 ?? "" }}">
                        <i class="fas fa-phone"></i>
                        <span>{{ $contact->phone_1 ?? "" }}</span>
                    </a>
                    <a href="tel:{{ $contact->phone_2 ?? "" }}">
                        <i class="fas fa-phone"></i>
                        <span>{{ $contact->phone_2 ?? "" }}</span>
                    </a>
                </div>
                <div class="search">
                    <i class="fas fa-search" data-bs-toggle="modal" data-bs-target="#exampleModal-search"></i>

                    <div class="dropdown">
                        @php $lang = session('locale') @endphp
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            @if(strlen($lang)>2) Ru @endif
                            @if($lang == "uz") Uz @endif
                            @if($lang == "ru") Ru @endif
                            @if($lang == "en") En @endif
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @if($lang != "uz") <li><a class="dropdown-item" href="/language/uz">Uz</a></li> @endif
                            @if($lang != "ru" and strlen($lang) == 2) <li><a class="dropdown-item" href="/language/ru">Ru</a></li> @endif
                            @if($lang != "en") <li><a class="dropdown-item" href="/language/en">En</a></li> @endif
                        </ul>
                    </div>

                </div>
            </div>
            <div class="navbar-bars">
                <div class="bars" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- navbar -->


@if(!empty($product))
    <!-- main -->
    <div class="main">
        <div class="container">
            <div class="main-content">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route("index") }}">@lang('front.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route("carditem",$product->sub_category_id) }}">@if(!empty($product->category)) {{ $product->category->title }} @endif</a></li>
                        <li class="breadcrumb-item active" ><a href="{{ route("productitem",$product->id) }}">{{ $product->title }}</a></li>
                    </ol>
                </nav>
                <h4 data-aos="fade-up" data-aos-duration="1500">
                    {{ $product->title }}
                </h4>
            </div>
        </div>
    </div>
    <!-- main -->
@endif

@if(!empty($product))
<!-- section -->
<div class="section-product-item">
    <div class="container">
        <div class="section-product-content">
            <div class="section-product-left">
                <div class="gallery-container" >
                    <div class="swiper-container gallery-main">
                        <div class="swiper-wrapper">
                            @foreach($product->images as $image)
                                <div class="swiper-slide">
                                    <img src="{{ asset("uploads/".$image->image) }}" alt="Slide 01">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">
                            @foreach($product->images as $img)
                                <div class="swiper-slide">
                                    <img src="{{ asset("uploads/".$img->image) }}" alt="Slide 010">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

            <div class="section-product-right">
                <h5 data-aos="fade-up" data-aos-duration="1500">{{ $product->info }}</h5>
                <p class="py-3" data-aos="fade-up" data-aos-duration="1500"><b>@lang('front.text.Packing'):</b></p>
                <div class="cost-content" data-aos="fade-up" data-aos-duration="1500">
                    <div class="cost-left">
                        @php $i=0 @endphp
                        @foreach($product->prices as $price)
                            <div class="cost-item @if($i==0) active @endif change_price" price="{{ $price->price }}">
                                <p>{{ $price->litr }}</p>
                            </div>
                        @php $i++ @endphp
                        @endforeach

                    </div>
                    <div class="cost-right">
                        <div class="cost-all">
                            <h5>
                                @php $i=0; @endphp
                                @foreach($product->prices as $price)
                                    <span class="narx echo_price  @if($i == 0)active @endif">{{ $price->price }}</span>
                                @php $i++ @endphp
                                @endforeach
                            </h5>
                        </div>
                    </div>
                </div>


                <div class="cost-result pt-4 pb-1" data-aos="fade-up" data-aos-duration="1500">
                    <div class="cost-result-item">
                        <div>
                            <img src="{{ asset('artColor/images/cost-result-1.png')}}" alt="">
                        </div>
                        <div>
                            <h6><b>@lang('front.text.Application'):</b></h6>
                            <p>{{ $product->application }}</p>
                        </div>
                    </div>

                    <div class="cost-result-item" data-aos="fade-up" data-aos-duration="1500">

                        <div>
                            <img src="{{ asset('artColor/images/cost-result-2.png')}}" alt="">
                        </div>
                        <div>
                            <h6><b>@lang('front.text.COMPOUND'):</b></h6>
                            <p>{{ $product->compound }}</p>
                        </div>
                    </div>

                    <div class="cost-result-item" data-aos="fade-up" data-aos-duration="1500">
                        <div>
                            <img src="{{ asset('artColor/images/cost-result-3.png')}}" alt="">
                        </div>
                        <div>
                            <h6><b>@lang('front.text.Consumption'):</b></h6>
                            <p>{{ $product->consumption }}</p>
                        </div>
                    </div>


                </div>
                <div class="cost-btn">
                    <a href="{{ route("about") }}">
                        <button class="buyBtn">
                            @lang('front.text.need_consultation')
                            <span>&#10230;</span>
                        </button>
                    </a>

                    <div class="about-us-btn">
                        <a href="{{ route("buypage") }}">
                            <button>
                                @lang('front.text.could_buy')
                                <span>&#10230;</span>
                            </button>
                        </a>
                    </div>

                    <a href="#contact">
                        <button class="buyBtn-outline">
                            @lang('front.text.buy_online')
                            <span>&#10230;</span>
                        </button>
                    </a>

                </div>
                <p class="cost-about-p" data-aos="fade-up" data-aos-duration="1500">
                    @lang('front.text.additional_characteristics'):
                </p>
                <div class="cost-about">
                    @foreach($product->characters as $character)
                        <div class="cost-about-item">
                            <p>{{ $character->title }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="cost-list">

                    <h4>@lang('front.text.Peculiarities')</h4>
                    {{ $product->peculiarit }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- section -->
@endif

@if(!empty($product))
    <!-- acc -->
    <div class="container py-5">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        {{ $product->accordion_title }}
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {{ $product->accordion_info }}
                    </div>
                </div>
            </div>

            <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        @lang('front.text.video_lessons')<span id="videoItem">({{ count($product->videos) }})</span>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="acc-content">
                            @foreach($product->videos as $video)
                                <div class="acc-item">
                                    <div class="acc-img">
                                        <img src="{{ asset("uploads/".$video->image) }}" alt="">
                                        <div class="acc-linear">
                                            <i class="fas fa-solid fa-play" ></i>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>

            <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        @lang('front.text.textures_gallery') <span id="galleryItem"> @if(count($product->gallery))({{ count($product->gallery) }}) @else (0) @endif</span>
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="acc-gallery"  id="gallery--getting-started">
                            @foreach($product->gallery as $gallery)
                                <div class="acc-gallery-item">
                                    <a href="{{ asset("uploads/".$gallery->image) }}" data-pswp-width="1500"
                                       data-pswp-height="1000"
                                       target="_blank">
                                        <div class="acc-gallery-img">
                                            <img src="{{ asset("uploads/".$gallery->image) }}" alt="">
                                            <div class="acc-linear">
                                                <img src="{{ asset("artColor/images/x-vector-yellow.png") }}" alt="">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        @lang('front.text.Downloads') ({{ count($product->downloads) }})
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @foreach($product->downloads as $download)
                            <div class="acc-content acc-border">
                                <div class="acc-left">
                                    <h2>{{ $download->title }}</h2>
                                    <p>
                                        @lang('front.text.Catalogs') – {{ $download->origin }} ({{ number_format($download->mb/1024,2,'.','') }} МB)
                                    </p>
                                </div>
                                <div class="acc-left">
                                    <div class="about-us-btn">
                                            <a href="{{ route("productdownload",$download->id) }}" download>
                                            <button>
                                                @lang('front.text.Download')
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </div>
@endif
<!-- acc -->

<!-- input form -->
<div class="form-input" id="contact">
    <div class="container">
        <form action="" method="get">
            <div class="form-content d-flex justify-content-between">
                <div class="form-left" data-aos="fade-up" data-aos-duration="1500">
                    <h4 class="text-capitalize">@lang('front.text.discuss_your_project')</h4>
                    <div class="form-item" data-aos="fade-up" data-aos-duration="1500">
                        <input type="text" name="fio" id="Имя" autocomplete="off" required>
                        <label for="username">@lang('front.text.Name')</label>
                    </div>
                    <div class="form-item" data-aos="fade-up" data-aos-duration="1500">
                        <input type="number" name="number" id="tel" autocomplete="off" required >
                        <label for="tel">@lang('front.text.Phone')</label>
                    </div>
                    <div class="form-item" data-aos="fade-up" data-aos-duration="1500">
                        <input type="email" name="email" id="mail" autocomplete="off" required >
                        <label for="mail">@lang('front.text.email')</label>
                    </div>
                    <div class="d-flex gap-2  justify-content-md-center justify-content-sm-center justify-content-lg-start" data-aos="fade-up" data-aos-duration="1500">
                        <input type="checkbox" id="ok" required>
                        <label for="ok" class="ok-text">@lang('front.text.i_agre') <a href="#">@lang('front.text.terms_of_personal_data_processing')</a></label>
                    </div>
                </div>
                <div class="form-right">
                    <button class="circleBtn" style="z-index: 100;">
                        @lang('front.text.submit_an_application')
                    </button>

                    <div id="map-content">
                        <div id="map" style="width: 100%; height: 100%; z-index: -1; ">

                            <div class="map-content-bg-display " id="btn-cl">
                                <div class="map-content-bg">
                                    <div>
                                        <img src="{{ asset('artColor/images/map-icon.png')}}" alt="">
                                        <p><b>@lang('front.text.click_display_map')</b></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </form>


    </div>
</div>
<!-- input form -->

<!-- footer -->
@include("layouts.front.footer")
<!-- footer -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe   src="https://www.youtube.com/embed/KuU44b3w1O4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
<!-- video modal -->
<!-- Modal -->
<div class="modal fade modal-search" id="exampleModal-search" tabindex="-1" aria-labelledby="exampleModalLabel-search" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="index.html"><img src="images/logo.png" alt=""></a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <h2>Поиск по сайту</h2>

                <div class="form-item">
                    <input type="text"  id="search" required>
                    <label for="search">Начните вводить текст...</label>
                </div>

                <p>НАПРИМЕР: <span>Декоративное покрытие Canyon</span></p>


                <div class="search-result">
                    <p><a href="pages/about.html">КОРОТКО О ARTCOLOR</a></p>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- search modal -->

<!-- aos animation -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<!-- aos animation -->

<!-- font awesome -->
<script src="https://kit.fontawesome.com/02b94d3768.js" crossorigin="anonymous"></script>
<!-- font awesome -->

<!-- bootstrap js -->
<script src="{{ asset('artColor/js/popper.min.js')}}"></script>
<script src="{{ asset('artColor/js/bootstrap.min.js')}}"></script>
<!-- bootstrap js -->

<!-- swiper -->
<script src="{{ asset('artColor/js/swiper.min.js')}}"></script>
<script>
    var galleryThumbs = new Swiper(".gallery-thumbs", {
        centeredSlides: true,
        centeredSlidesBounds: true,
        slidesPerView: 3,
        watchOverflow: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        direction: 'vertical'
    });

    var galleryMain = new Swiper(".gallery-main", {
        watchOverflow: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        preventInteractionOnTransition: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        thumbs: {
            swiper: galleryThumbs
        }
    });

    galleryMain.on('slideChangeTransitionStart', function() {
        galleryThumbs.slideTo(galleryMain.activeIndex);
    });

    galleryThumbs.on('transitionStart', function(){
        galleryMain.slideTo(galleryThumbs.activeIndex);
    });
</script>
<!-- swiper -->

<!-- map -->
<script src="https://api-maps.yandex.ru/2.1/?apikey=92bd9a31-f25d-42dd-a08e-7de4b146adb1&lang=en_US" type="text/javascript"> </script>
<script>
    // ymaps.ready(init);
    //     function init(){
    //             var myMap = new ymaps.Map("map", {
    //             center: [41.35, 69.25],
    //             zoom: 10 ,
    //             controls: []

    //         });
    //     }
</script>
<script src="{{ asset('artColor/js/map.js')}}"></script>
<!-- map -->
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
    // cost item

    let costItem = document.getElementsByClassName('cost-item');
    let narx = document.getElementsByClassName('narx');

    costItem[0].onclick = () =>{
        costItem[0].classList.add('active')
        costItem[1].classList.remove('active')
        costItem[2].classList.remove('active')

        narx[0].classList.add('active')
        narx[1].classList.remove('active')
        narx[2].classList.remove('active')


    }
    costItem[1].onclick = () =>{
        costItem[0].classList.remove('active')
        costItem[1].classList.add('active')
        costItem[2].classList.remove('active')

        narx[0].classList.remove('active')
        narx[1].classList.add('active')
        narx[2].classList.remove('active')
    }
    costItem[2].onclick = () =>{
        costItem[0].classList.remove('active')
        costItem[1].classList.remove('active')
        costItem[2].classList.add('active')

        narx[0].classList.remove('active')
        narx[1].classList.remove('active')
        narx[2].classList.add('active')
    }
    const validateEmail = (mail) => {
        return mail.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
    };

    let checkbox = document.getElementById('ok');
    if(checkbox){
        checkbox.addEventListener('click' , function(){
            if(checkbox.checked == true){
                // input value
                let name = document.getElementById('Имя').value ;
                let tel = document.getElementById('tel').value ;
                let mail = document.getElementById('mail').value ;

                // input
                let mailInput = document.getElementById('mail');
                let telInput = document.getElementById('tel') ;
                let nameInput = document.getElementById('Имя') ;

                if(validateEmail(mail)){
                    mailInput.style.borderBottom = '2px solid green'
                }else{
                    mailInput.style.borderBottom = '2px solid red'
                }

                if(name == ''){
                    nameInput.style.borderBottom = '2px solid red'
                }else{
                    nameInput.style.borderBottom = '2px solid green'
                }

                if(tel == ""){
                    telInput.style.borderBottom = '2px solid red'
                }else{
                    telInput.style.borderBottom = '2px solid green'
                }



            }else{
                console.log('checkbox isn\'t checked ')
            }
        })
    }


</script>

<script type="module">
    // Include Lightbox
    import PhotoSwipeLightbox from '{{ asset('artColor/js/photoswipe-lightbox.esm.min.js')}};

    const lightbox = new PhotoSwipeLightbox({
        // may select multiple "galleries"
        gallery: '#gallery--getting-started',

        // Elements within gallery (slides)
        children: 'a',

        // setup PhotoSwipe Core dynamic import
        pswpModule: () => import('{{ asset('artColor/js/photoswipe.esm.min.js')}})
    });
    lightbox.init();

</script>
<!-- my js code -->
<script src="{{ asset('artColor/js/jquery.min.js')}}"></script>
<script>
    $(document).on("click",".change_price",function (){
        var price = $(this).attr("price");
        $(".echo_price").text(price);
    })
</script>
</body>
</html>
