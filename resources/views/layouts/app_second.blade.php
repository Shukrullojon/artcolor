<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Muhammadsolih">
    <title>ArtColor НОВОСТИ</title>
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
<body class="Navbar-Static blogPage">
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
        </ul>
        @php
            $contact = \App\Models\Contact::latest()->first();
        @endphp
        <div class="navbar-phone">
            <a href="tel:{{ $contact->phone_1 }}">
                <i class="fas fa-phone"></i>
                <span>{{ $contact->phone_1 }}</span>
            </a>
            <a href="tel:{{ $contact->phone_2 }}">
                <i class="fas fa-phone"></i>
                <span>{{ $contact->phone_2 }}</span>
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
                <a href="{{ route("index") }}">
                    <img src="{{ asset('uploads/'.$contact->logo)}}" alt="">
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
                    <a href="tel:{{ $contact->phone_1 }}">
                        <i class="fas fa-phone"></i>
                        <span>{{ $contact->phone_1 }}</span>
                    </a>
                    <a href="tel:{{ $contact->phone_2 }}">
                        <i class="fas fa-phone"></i>
                        <span>{{ $contact->phone_2 }}</span>
                    </a>
                </div>
                <div class="search">
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



<!-- footer -->
@include('layouts.front.footer')
<!-- footer -->

<!-- Modal -->
<div class="modal fade modal-search" id="exampleModal-search" tabindex="-1" aria-labelledby="exampleModalLabel-search" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="index.html"><img src="{{ asset('artColor/images/logo.png')}}" alt=""></a>
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


    const tabs = document.querySelector(".blog-right");
    const tabButton = document.querySelectorAll(".tab-button");
    const contents = document.querySelectorAll(".section-blog-item");

    tabs.onclick = e => {
        const id = e.target.dataset.id;
        if (id) {
            tabButton.forEach(btn => {
                btn.classList.remove("active");
            });
            e.target.classList.add("active");

            contents.forEach(content => {
                content.classList.remove("active");
            });
            const element = document.getElementById(id);
            element.classList.add("active");
        }
    }
</script>
<!-- my js -->

@yield('scripts')

</body>
</html>
