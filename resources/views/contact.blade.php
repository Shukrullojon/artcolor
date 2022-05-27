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
                            <li class="breadcrumb-item active" ><a href="{{ route("contact") }}">@lang('front.sidebar.contact')</a></li>
                        </ol>
                    </nav>
                    <h4 data-aos="fade-up" data-aos-duration="1500">
                        {{ $header->title }}
                    </h4>

                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <p>
                                {{ $header->info }}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <div class="about-us-btn">
                                <a href="{{ $header->button_link }}">
                                    <button>
                                        {{ $header->button }}
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


    <!-- map contact -->
    <div class="map-content">
        <div id="map" style="width: 100%;"></div>
        <div class="container">
            <div class="map-content-display">
                <div class="map-content-item">
                    <div class="map-content-close-btn">
                        <i class="fa fa-close"></i>
                    </div>
                    <div class="map-content-about">
                        <img src="{{ asset('artColor/images/contact-img.png')}}" alt="">
                        <div class="map-text">
                            <p class="pb-3">Магазин «Маляр»</p>
                            <div>
                                <span>АДРЕС</span>
                                <p>
                                    г. Черновцы, рынок "Дубробут", 4-3-15
                                </p>
                            </div>
                            <div>
                                <span>ГРАФИК РАБОТЫ</span>
                                <p>
                                    Вт-нд: 09:00–15:00
                                </p>
                            </div>
                            <div>
                                <span>ТЕЛЕФОН</span>
                                <p>
                                    <a href="tel:+38 050 602 16 75" class="text-dark">+38 050 602 16 75</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="map-content-bg-display" id="btn-cl">
            <div class="map-content-bg">
                <div>
                    <img src="{{ asset('artColor/images/map-icon.png')}}" alt="">
                    <p><b>Нажмите для отображения карты</b></p>
                </div>
            </div>
        </div>
    </div>
    <!-- map contact -->

    <!-- map content form -->
    <div class="map-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="map-form-item">
                        <div class="map-form-item-text">
                            <div>
                                <span>Адрес:</span>
                                <p><b>ул.Бунёдкор 9, Чиланзарский район, Ташкент, Узбекистан</b></p>
                            </div>
                            <div>
                                <span>Эл. адрес:</span>
                                <p><a href="mailto:artcolor.com@info">artcolor.com@info</a></p>
                            </div>
                            <div>
                                <span>Телефон:</span>
                                <p><a href="tel:+998 99 777 77 77">+998 99 777 77 77</a></p>
                            </div>
                        </div>

                        <div class="map-iframe">
                            <div id="map-2" style="width: 100%;"></div>

                            <div class="map-form-bg-display map-form-bg-display-2" id="btn-cl-1">
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

                <div class="col-lg-6">
                    <div class="map-form-item">

                        <div class="map-form-item-form">
                            <h4>Обсудим ваш проект?</h4>
                            <form action="">
                                <div class="d-flex flex-wrap">
                                    <div class="form-item w-100">
                                        <!-- <input type="text" id="КОНТАКТА" autocomplete="off" required> -->
                                        <select name="" id="КОНТАКТА" onfocus="regionClose()">
                                            <option value="none"></option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                        <label for="КОНТАКТА">Тип контакта*</label>
                                    </div>

                                    <div class="form-item">
                                        <input type="text" id="имя" autocomplete="off" onfocus="regionClose()" required>
                                        <label for="имя">Ваше имя*</label>
                                    </div>

                                    <div class="form-item">

                                        <input type="text" id="Страна" class="region-btn" onclick="regionChange()"  autocomplete="off" required>

                                        <label for="Страна">Страна*</label>

                                        <div class="region">
                                            <div class="region-content">
                                                <div class="region-item">
                                                    <input type="search" onkeyup="searchInputt()"  autocomplete="off" placeholder="Найти..." id="searchInput">
                                                </div>
                                                <ul class="region-serach-result">
                                                    <li class="region-item search-item">
                                                        <a class="search-item-text">Фергана</a>
                                                    </li>
                                                    <li class="region-item search-item">
                                                        <a class="search-item-text">Тошкент</a>
                                                    </li>
                                                    <li class="region-item search-item">
                                                        <a class="search-item-text">Наманган</a>
                                                    </li>
                                                    <li class="region-item search-item">
                                                        <a class="search-item-text">Андижон</a>
                                                    </li>
                                                    <li class="region-item search-item">
                                                        <a class="search-item-text">Тошкент</a>
                                                    </li>
                                                    <li class="region-item search-item">
                                                        <a class="search-item-text">Тошкент</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-item">
                                        <input type="email" id="mail" autocomplete="off" onfocus="regionClose()"  required>
                                        <label for="mail">Эл. адрес</label>
                                    </div>

                                    <div class="form-item">
                                        <input type="number" id="tel" autocomplete="off "  onfocus="regionClose()"  required>
                                        <label for="tel">Телефон</label>
                                    </div>

                                    <div class="form-item w-100 xabar">
                                        <textarea name="" id="Сообщение" cols="30" rows="10" autocomplete="off"  onfocus="regionClose()" required></textarea>
                                        <label for="Сообщение">Сообщение*</label>
                                    </div>
                                </div>


                                <div class="d-flex gap-2  justify-content-md-center justify-content-sm-center justify-content-lg-start checkbox-map align-items-center">
                                    <input type="checkbox" id="ok">
                                    <label for="ok" class="ok-text">Я согласен с <a href="#">условиями обработки персональных данных</a></label>
                                </div>




                                <div class="map-btn">
                                    <button class="circleBtn">
                                        Отправить заявку
                                    </button>
                                </div>
                            </form>



                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="map-form-bg" style="background-image: url('{{ asset('artColor/images/map-form-bg.png') }}');"></div>
    </div>
    <!-- map content form -->


    <!-- map about content -->
    @if(!empty($footer))
        <!-- pages About -->
        <div class="pagesAbout">
            <div class="container">
                <h3 data-aos="fade-up" data-aos-duration="1500">{{ $footer->title }}</h3>
                {{ $footer->info }}
            </div>
        </div>
        <!-- pages About -->
    @endif
    <!-- map about content -->

@endsection
