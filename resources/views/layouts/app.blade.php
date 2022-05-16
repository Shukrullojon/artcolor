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

    <!-- swipper js -->
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
                <a href="index.html"  class="active">Главная</a>
            </li>
            <li>
                <a href="pages/product.html">Продукция</a>
            </li>
            <li>
                <a href="pages/about.html">О компании</a>
            </li>
            <li>
                <a href="pages/contact.html">Контакты</a>
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
                <a href="index.html">
                    <img src="{{ asset('artColor/images/logo.png')}}" alt="">
                </a>
                <ul>
                    <li>
                        <a href="index.html"  class="active">Главная</a>
                    </li>
                    <li>
                        <a href="pages/product.html">Продукция</a>
                    </li>
                    <li>
                        <a href="pages/about.html">О компании</a>
                    </li>
                    <li>
                        <a href="pages/contact.html">Контакты</a>
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

@yield('content')

<!-- input form -->
<div class="form-input">
    <div class="container">

        <form action="">

            <div class="form-content d-flex justify-content-between">
                <div class="form-left">
                    <h4 class="text-capitalize" data-aos="fade-up" data-aos-duration="1500">Обсудим ваш проект?</h4>
                    <div class="form-item" data-aos="fade-up" data-aos-duration="1500">
                        <input type="text" id="Имя" autocomplete="off" required>
                        <label for="username">Имя</label>
                    </div>
                    <div class="form-item" data-aos="fade-up" data-aos-duration="1500">
                        <input type="number" id="tel"  autocomplete="off"  required>
                        <label for="tel">Телефон</label>
                    </div>
                    <div class="form-item" data-aos="fade-up" data-aos-duration="1500">
                        <input type="email" id="mail" autocomplete="off"  required>
                        <label for="mail">Эл. адрес</label>
                    </div>
                    <div class="d-flex gap-2  justify-content-md-center justify-content-sm-center align-items-center justify-content-lg-start" data-aos="fade-up" data-aos-duration="1500">
                        <input type="checkbox" id="ok"  style="color: #fff;">
                        <label for="ok" class="ok-text" >Я согласен с <a href="#">условиями обработки персональных данных</a></label>
                    </div>
                </div>
                <div class="form-right">
                    <button class="circleBtn" style="z-index: 100;">
                        Отправить заявку
                    </button>

                    <div id="map-content">
                        <div id="map" style="width: 100%; height: 100%; z-index: -1; ">

                            <div class="map-content-bg-display " id="btn-cl">
                                <div class="map-content-bg">
                                    <div>
                                        <img src="{{ asset('artColor/images/map-icon.png')}}" alt="">
                                        <p><b>Нажмите для отображения карты</b></p>
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
<div class="footer">
    <div class="container">

        <div class="footer-content d-flex justify-content-center text-center text-sm-start   justify-content-sm-between">
            <div class="footer-item" data-aos="fade-up" data-aos-duration="1500">
                <a href="index.html"><img src="{{ asset('artColor/images/logo.png')}}" alt=""></a>
                <p>Ведущий узбекский производитель декоративно-отделочных материалов</p>
                <h6 class="mb-3">Подписывайтесь на нас</h6>
                <div class="main-social-app">
                    <a href="#">
                        <i class="fab fa-telegram"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
            <div class="footer-item" data-aos="fade-up" data-aos-duration="1500">
                <a href="index.html">Главная</a>
                <a href="pages/product.html">Продукция</a>
                <a href="pages/about.html">О компании</a>
                <a href="pages/blog.html">Новости</a>
                <a href="pages/servise.html">Сервисы</a>
                <a href="pages/downloadmaterial.html">Материалы для скачивания</a>
                <a href="pages/contact.html">Контакты</a>
            </div>
            <div class="footer-item" data-aos="fade-up" data-aos-duration="1500">
                <h6>Адрес:</h6>

                <div class="address">
                    <div>
                        <img src="{{ asset('artColor/images/location.png') }}" alt="">
                    </div>
                    <div>
                        <p>
                            Улица Бунёдкор 9, Чиланзарский район, Ташкент, Узбекистан
                        </p>
                    </div>
                </div>
                <div class="address">
                    <div>
                        <img src="{{ asset('artColor/images/location.png')}}" alt="">
                    </div>
                    <div>
                        <p>
                            Узбекистан, Ташкент, улица Хадра
                        </p>
                    </div>
                </div>
                <div class="address">
                    <div>
                        <img src="{{ asset('artColor/images/location.png')}}" alt="">
                    </div>
                    <div>
                        <p>
                            Узбекистан, Ташкент, просп. Амира Темура, 1
                        </p>
                    </div>
                </div>

            </div>

            <div class="footer-item" data-aos="fade-up" data-aos-duration="1500">
                <h6>Контакты:</h6>

                <div class="address">
                    <div>
                        <i class="fas fa-solid fa-phone"></i>
                    </div>
                    <div>
                        <p>
                            <a href="tel:+998 99 777 77 77">+998 99 777 77 77</a>
                        </p>
                    </div>
                </div>
                <div class="address">
                    <div>
                        <i class="fas fa-solid fa-envelope"></i>
                    </div>
                    <div>
                        <p>
                            <a href="mailto:artcolor.com@info">artcolor.com@info</a>
                        </p>
                    </div>
                </div>
                <h6 class="my-3">Расписание:</h6>
                <div class="address">
                    <div>
                        <i class="fas fa-solid fa-clock"></i>
                    </div>
                    <div>
                        <p>
                            ПН-СБ с 10:00 до 19:00
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="footer-ads">
        <div class="container">
            <div class="footer-ads-content d-flex justify-content-between align-items-center">
                <div class="footer-left">
                    <p>При перепечатке любых материалов ссылка на веб-сайт обязательна</p>
                </div>
                <div class="footer-right">
                    <p>2022. Все права защищены. </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer -->


<!-- video modal -->
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

<!-- swipper js -->
<script src="{{ asset('artColor/js/swiper.min.js')}}"></script>
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

            600: {
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
</body>
</html>
