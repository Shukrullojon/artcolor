@extends('layouts.app_second')

@section('content')
    <!-- main -->
    <div class="main py-5">
        <div class="container">
            <div class="main-content">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../index.html">Главная</a></li>
                        <li class="breadcrumb-item active" ><a href="buyPage.html">ГДЕ КУПИТЬ</a></li>
                    </ol>
                </nav>
                <h4 data-aos="fade-up" data-aos-duration="1500">
                    ГДЕ КУПИТЬ
                </h4>

                <div class="row align-items-center">
                    <div class="col-md-8" data-aos="fade-up" data-aos-duration="1500">
                        <p>
                            Мы всегда рады помочь Вам и ответить на все вопросы, исходя из нашего опыта.
                            Давайте вместе создавать красивые проекты.
                        </p>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-duration="1500">
                        <div class="about-us-btn">
                            <a href="blog.html">
                                <button>
                                    Подписоция на новостей
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main -->


    <!-- buypages content -->
    <div class="buypages">
        <div class="container">



            <div class="buypages-content">

                <div class="buypages-map">

                    <div class="iframe-relative">
                        <div id="map" style="width: 100%;"></div>
                        <!-- <div class="map-content-bg-display">
                            <div class="map-content-bg">
                                <div>
                                    <img src="../images/map-icon.png" alt="">
                                    <p><b>Нажмите для отображения карты</b></p>
                                </div>
                            </div>
                        </div> -->
                    </div>


                    <div class="map-content-display"  >
                        <div class="map-content-item" style="z-index: 10000;">
                            <div class="map-content-about">
                                <div class="map-text">

                                    <div>
                                        <span>Адрес </span>
                                        <p>
                                            ул.Бунёдкор 9, Чиланзарский район, Ташкент, Узбекистан
                                        </p>
                                    </div>
                                    <div>
                                        <span>Эл. адрес:</span>
                                        <p>
                                            <a href="mailto:artcolor.com@info" class="text-dark">artcolor.com@info</a>
                                        </p>
                                    </div>
                                    <div>
                                        <span>телефон</span>
                                        <p>
                                            <a href="tel:+998 99 777 77 77" class="text-dark">+998 99 777 77 77</a>
                                        </p>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>



                </div>



            </div>

            <!-- input form -->
            <div class="form-input">
                <div class="container">

                    <form action="">

                        <div class="form-content d-flex justify-content-between">
                            <div class="form-left">
                                <h4 class="text-capitalize">Обсудим ваш проект?</h4>
                                <div class="form-item">
                                    <input type="text" id="Имя" autocomplete="off" required>
                                    <label for="username">Имя</label>
                                </div>
                                <div class="form-item">
                                    <input type="number" id="tel" autocomplete="off" required >
                                    <label for="tel">Телефон</label>
                                </div>
                                <div class="form-item">
                                    <input type="email" id="mail" autocomplete="off" required >
                                    <label for="mail">Эл. адрес</label>
                                </div>
                                <div class="d-flex gap-2  justify-content-md-center justify-content-sm-center justify-content-lg-start">
                                    <input type="checkbox" id="ok">
                                    <label for="ok" class="ok-text">Я согласен с <a href="#">условиями обработки персональных данных</a></label>
                                </div>
                            </div>
                            <div class="form-right">
                                <button class="circleBtn" >
                                    Отправить заявку
                                </button>
                                <img src="../images/main-video-bg.png" class="img-form" alt="form-img">



                            </div>
                        </div>

                    </form>



                </div>
            </div>
            <!-- input form -->


        </div>
    </div>
    <!-- buypages content -->

@endsection
