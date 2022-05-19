@extends('layouts.app')

@section('content')
    <!-- main -->
    <div class="mainPage" style="background-image: url('{{ asset("artColor/images/main-video-bg.png")}}');">
        <div class="mainPage-bg">
            <div class="container">
                <div class="mainPage-content">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url("/") }}">@lang('front.sidebar.home')</a></li>
                            <li class="breadcrumb-item active" ><a href="{{ url("about") }}">@lang('front.sidebar.about_company')</a></li>
                        </ol>
                    </nav>
                    <h4 data-aos="fade-up" data-aos-duration="1500" >@lang('front.sidebar.about_company')</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- main -->

    <!-- about -->
    @if(!empty($about))
        <div class="about  my-3 ">
            <div class="container">
                <div class="about-content d-flex justify-content-between align-items-center">
                    <div class="about-left" data-aos="fade-up"  data-aos-duration="1500">
                        <h1>{!! $about->title !!}</h1>
                        <h5 class="py-4">{!! $about->title_short !!}</h5>
                        <p>
                            {!! $about->text !!}
                        </p>
                        @if(count($items)>0)
                            <div class="about-result pt-4">
                                <div class="about-result-content d-flex flex-wrap gap-4">
                                    @php $le = 1500; @endphp
                                    @foreach($items as $item)
                                        <div class="about-result-item" data-aos="fade-up"  data-aos-duration="{{ $le }}">
                                            <h1>{{ $item->count }}</h1>
                                            <p>{{ $item->title }}</p>
                                        </div>
                                        @php $le += 500; @endphp
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="about-right" data-aos="fade-up"  data-aos-duration="1500">
                        <div class="about-img ">
                            <img src="{{ asset('uploads/'.$about->image)}}" alt="">
                        </div>
                        <p class="pt-3">{!! $about->text_right !!}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- about -->

    @if(count($teams)>0)
        <!-- section team swipper -->
        <div class="about-page-swiper">
            <div class="container">
                <div class="about-page-content row">
                    <div class="col-md-6 col-sm-4 col-12">
                        <h2 data-aos="fade-up" data-aos-duration="1500">@lang('front.text.management')</h2>
                    </div>
                    <div class="col-md-6 col-sm-8 col-12">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>

            <div class="swiper-content">
                <div class="swiper">

                    <div class="swiper-wrapper">
                        @foreach($teams as $team)
                            <div class="swiper-slide">
                                <div class="swiper-slide-item">
                                    <img src="{{ asset('uploads/'.$team->image)}}" alt="">
                                    <h5>{!! $team->fio !!}</h5>
                                    <p>{!! $team->position !!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- section team swipper -->
    @endif

    @if(!empty($aboutAbout))
        <!-- about-about -->
        <div class="about-about">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-12">
                        <div class="about-about-img">
                            <img src="{{ asset("uploads/".$aboutAbout->image) }}" alt="">
                            <div class="about-shape"></div>
                        </div>
                    </div>
                    <div class="col-md-6 offset-lg-1 col-12">
                        <h5 data-aos="fade-up" data-aos-duration="1500">{!! $aboutAbout->title !!}</h5>
                        <p data-aos="fade-up" data-aos-duration="2000">
                            <b>{!! $aboutAbout->info !!}</b>
                        </p>
                        <p data-aos="fade-up" data-aos-duration="2500">
                            {!! $aboutAbout->text !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- about-about -->
    @endif


    @if(!empty($about->video_image))
        <!-- main video -->
        <div class="main-video d-flex justify-content-center align-items-center" style="background-image: url('{{ asset("uploads/".$about->video_image) }}'); ">
            <div class="video d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-solid fa-play" ></i>
            </div>
        </div>
        <!-- main video -->
    @endif

    @if(!empty($about) and !empty($about->video_link))
        @section('video')
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" id="video-close" onclick="videoPause()" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <iframe id="videoframe"   src="{{ $about->video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <!-- video modal -->
        @endsection
    @endif

    @if(!empty($aboutText))
        <!-- about-about-item 2 -->
        <div class="about-about about-about-item-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <p data-aos="fade-up" data-aos-duration="1500" >
                            <b>{!! $aboutText->title !!}</b>
                        </p>
                        <p data-aos="fade-up" data-aos-duration="2000" >
                            {!! $aboutText->info !!}
                        </p>
                    </div>

                    <div class="col-md-4  offset-lg-2 offset-md-1 col-12">
                        <div class="about-about-img">
                            <p data-aos="fade-up" data-aos-duration="2500" >
                                {!! $aboutText->additional !!}
                            </p>
                            <div class="about-shape"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- about-about-item 2 -->
    @endif

    <!-- input form -->
    <div class="form-input">
        <div class="container">

            <form action="">

                <div class="form-content d-flex justify-content-between">
                    <div class="form-left">
                        <h4 class="text-capitalize" data-aos="fade-up" data-aos-duration="1500" >Обсудим ваш проект?</h4>
                        <div class="form-item" data-aos="fade-up" data-aos-duration="2000" >
                            <input type="text" id="Имя" autocomplete="off" required>
                            <label for="username" >Имя</label>
                        </div>
                        <div class="form-item" data-aos="fade-up" data-aos-duration="2500" >
                            <input type="number" id="tel" autocomplete="off"  required>
                            <label for="tel">Телефон</label>
                        </div>
                        <div class="form-item" data-aos="fade-up" data-aos-duration="3000" >
                            <input type="email" id="mail" autocomplete="off"  required>
                            <label for="mail">Эл. адрес</label>
                        </div>
                        <div class="d-flex gap-2  justify-content-md-center justify-content-sm-center justify-content-lg-start" data-aos="fade-up" data-aos-duration="3000" >
                            <input type="checkbox" id="ok">
                            <label for="ok" class="ok-text">Я согласен с <a href="#">условиями обработки персональных данных</a></label>
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
                                            <img src="../images/map-icon.png" alt="">
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

@endsection

@section('swiper')
    <script>
        var swiper = new Swiper('.swiper', {
            breakpoints: {

                300: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },

                400: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },

                800: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },

                1000: {
                    slidesPerView: 4,
                    spaceBetween: 20
                }
            } ,
            slidesPerView: 5,
            centeredSlides: false,
            paginationClickable: false,
            loop: false,
            spaceBetween: 30,
            slideToClickedSlide: true ,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },


        });
    </script>
@endsection

@section('scriptis')

@endsection

