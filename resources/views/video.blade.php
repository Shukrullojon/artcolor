<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Muhammadsolih">
    <title>ArtColor ВИДЕО ГАЛЕРЕЯ</title>

    <!-- aos animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- aos animation -->

    <!-- logo icon -->
    <link rel="icon" href="{{ asset("artColor/images/card-item-1.png") }}">
    <!-- logo icon -->

    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset("artColor/style/bootstrap.min.css")}}">
    <!-- bootstrap css -->

    <!-- my style code -->
    <link rel="stylesheet" href="{{ asset("artColor/style/style.css")}}">
    <link rel="stylesheet" href="{{ asset("artColor/style/media.css")}}">
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
                <a href="../index.html"  class="active">Главная</a>
            </li>
            <li>
                <a href="product.html">Продукция</a>
            </li>
            <li>
                <a href="about.html">О компании</a>
            </li>
            <li>
                <a href="contact.html">Контакты</a>
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
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Ru
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Eng</a></li>
                    <li><a class="dropdown-item" href="#">Uz</a></li>
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
                <a href="../index.html">
                    <img src="../images/logo-Black.png" alt="">
                </a>
                <ul>
                    <li>
                        <a href="../index.html" >Главная</a>
                    </li>
                    <li>
                        <a href="product.html">Продукция</a>
                    </li>
                    <li>
                        <a href="about.html">О компании</a>
                    </li>
                    <li>
                        <a href="contact.html">Контакты</a>
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
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Ru
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Eng</a></li>
                            <li><a class="dropdown-item" href="#">Uz</a></li>
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



@if(!empty($header))
    <!-- main -->
    <div class="main py-5">
        <div class="container">
            <div class="main-content">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route("index") }}">@lang('front.sidebar.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route("gallery") }}">@lang('front.sidebar.gallery')</a></li>
                        <li class="breadcrumb-item active" ><a href="">@lang('front.text.Gallery_invoice')</a></li>
                    </ol>
                </nav>
                <h4 data-aos="fade-up" data-aos-duration="1500" >
                    {{ $header->title }}
                </h4>

                <p data-aos="fade-up" data-aos-duration="1500" >
                    {{ $header->info }}
                </p>

            </div>
        </div>
    </div>
    <!-- main -->
@endif

<div class="gallery-item-bg">
    <!-- section card -->
    <div class="section-card text-3d gallery-item-bg-1">
        <div class="container">
            <form action="" onchange="filter()">
                <div class="filter-row">
                    <div class="filter-item">
                        <p>@lang('front.text.FILTERS'):</p>
                    </div>
                    @if(count($filters))
                        <div class="filter-item">
                            <p>РУБРИКИ</p>
                            <select name="" id="RUBRIKALAR">
                                <option value="none">ВЫБРАТЬ</option>
                                @foreach($filters as $filter)
                                    <option value="{{ $filter->id }}">{{ $filter->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <!-- section card -->

    <!-- card- item -->
    <div class="">
        <div class="container card-item-Page text-3d">
            <div class="card-foot d-flex  flex-wrap gap-4" id="gallery--getting-started">
                @foreach($videos as $video)
                    <div class="card-foot-item" id="{{ $video->filter_id }}">
                        <div class="card-img text-center">
                            <img src="{{ asset("uploads/".$video->image) }}" class="img-fluid" alt="">
                            <div class="card-foot-item-shape pulse">
                                <a  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <span>
                                        <i class="fa fa-play"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <h5>{{ $video->title }}</h5>
                        <p>
                            <a href="{{ asset("uploads/".$video->image) }}">
                                @lang('front.text.more')
                                <span>&#10230;</span>
                            </a>
                        </p>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- card- item -->
</div>


@if(!empty($footer))
    <!-- pages About -->
    <div class="pagesAbout addPadding">
        <div class="container">
            <h2 data-aos="fade-up" data-aos-duration="1500">{{ $footer->title }}</h2>
            <p data-aos="fade-up" data-aos-duration="1500">
                {{ $footer->info }}
            </p>

        </div>
    </div>
    <!-- pages About -->
@endif

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" id="video-close" onclick="videoPause()" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe id="videoframe"   src="https://www.youtube.com/embed/KuU44b3w1O4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
<!-- video modal -->

<!-- footer -->
@include('layouts.front.footer')
<!-- footer -->

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

<!-- video -->
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
<!-- video -->

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
<script src="{{ asset("artColor/js/popper.min.js")}}"></script>
<script src="{{ asset("artColor/js/bootstrap.min.js")}}"></script>
<!-- bootstrap js -->

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
        let RUBRIKALAR = document.querySelector('#RUBRIKALAR');


        if(RUBRIKALAR){

            let cardItem = document.querySelectorAll('.card-foot-item');

            cardItem.forEach(element => {
                let cardId  = element.getAttribute('id');

                if(!(cardId == RUBRIKALAR.value)){
                    element.style.display = 'none'
                }
                if(cardId == RUBRIKALAR.value){
                    element.style.display = 'block'
                }

            });
        }
    }
</script>
<!-- my js code -->

</body>
</html>
