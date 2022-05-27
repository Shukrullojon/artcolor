<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--aos animation  -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!--aos animation  -->

    <!-- logo icon -->
    <link rel="icon" href="{{ asset('artColor/images/card-item-1.png') }}">
    <!-- logo icon -->

    <!-- swipper css -->
    <link rel="stylesheet" href="{{ asset('artColor/style/swiper.min.css')}}">
    <!-- swipper js -->

    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('artColor/style/bootstrap.min.css')}}">
    <!-- bootstrap css -->

    <!-- my style code -->
    <link rel="stylesheet" href="{{ asset('artColor/style/style.css')}}">
    <link rel="stylesheet" href="{{ asset('artColor/style/media.css')}}">
    <!-- my style code -->
</head>
<body>
<!-- loader -->
<div id="loader-content">
    <div class="loader-display">
        <h1 data-text="Art Color" class="loader">Art Color</h1>
    </div>
</div>
<!-- loader -->

<!-- progress bar -->
<div class="progress-bar"></div>
<!-- progress bar -->

<!-- btn -->
<button type="button" class="toTop pulse" id="btn-back-to-top">
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
                <a href="{{ url("/") }}"  class="active">@lang('front.sidebar.home')</a>
            </li>
            <li>
                <a href="{{ route("product") }}">@lang('front.sidebar.product')</a>
            </li>
            <li>
                <a href="{{ route("about") }}">@lang('front.sidebar.about_company')</a>
            </li>
            <li>
                <a href="pages/contact.html">@lang('front.sidebar.contact')</a>
            </li>
        </ul>
        <div class="navbar-phone">
            <a href="tel:+998 90 780 06 60">
                <i class="fas fa-phone"></i>
                <span>+998 90 780 06 60</span>
            </a>
            <a href="tel:+998 90 780 06 60">
                <i class="fas fa-phone"></i>
                <span>+998 90 780 06 60</span>
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
                    <img src="{{ asset('artColor/images/logo.png')}}" alt="">
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
                        <a href="pages/contact.html" @if(Route::currentRouteName() == "contact") class="active" @endif>@lang('front.sidebar.contact')</a>
                    </li>
                </ul>
            </div>
            <div class="navbar-right">
                <div class="navbar-phone">
                    <a href="tel:+998 90 780 06 60">
                        <i class="fas fa-phone"></i>
                        <span>+998 90 780 06 60</span>
                    </a>
                    <a href="tel:+998 90 780 06 60">
                        <i class="fas fa-phone"></i>
                        <span>+998 90 780 06 60</span>
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

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

@yield('content')

@include('layouts.front.footer')

@yield('video')
<!-- video modal -->

<!-- Modal -->
<div class="modal fade modal-search" id="exampleModal-search" tabindex="-1" aria-labelledby="exampleModalLabel-search" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="{{ url("/") }}"><img src="{{ asset('artColor/images/logo.png')}}" alt=""></a>
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
                    <p><a href="{{ route("about") }}">КОРОТКО О ARTCOLOR</a></p>
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

<!-- swipper js -->
<script src="{{ asset('artColor/js/swiper.min.js')}}"></script>
@yield('swiper')
<!-- swipper js -->
<!-- map -->
<script src="https://api-maps.yandex.ru/2.1/?apikey=92bd9a31-f25d-42dd-a08e-7de4b146adb1&lang=en_US" type="text/javascript"> </script>
<script src="{{ asset('artColor/js/map.js')}}">

</script>
<!-- map -->

<script>
    function videoPause(){
        let videoClose = document.getElementById('video-close');
        let video = document.getElementById('videoframe');
        if ( video ) {
            var iframeSrc = video.src;
            video.src = iframeSrc;
        }
    }
</script>

<!-- my js code -->
<script src="{{ asset('artColor/js/main.js')}}"></script>
<!-- my js code -->


@yield('scripts')

</body>
</html>
