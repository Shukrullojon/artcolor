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
                            <li class="breadcrumb-item active" ><a href="">@lang('front.text.Where_could_I_buy')</a></li>
                        </ol>
                    </nav>
                    <h4 data-aos="fade-up" data-aos-duration="1500">
                        {{ $header->title }}
                    </h4>
                    <div class="row align-items-center">
                        <div class="col-md-8" data-aos="fade-up" data-aos-duration="1500">
                            <p>
                                {!! $header->info !!}
                            </p>
                        </div>
                        <div class="col-md-4" data-aos="fade-up" data-aos-duration="1500">
                            <div class="about-us-btn">
                                <a href="{{ route("blog") }}">
                                    <button>
                                        @lang('front.text.subscribe_to_news')
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
                    @if(!empty($contact))
                        <div class="map-content-display">
                            <div class="map-content-item" style="z-index: 10000;">
                                <div class="map-content-about">
                                    <div class="map-text">
                                        <div>
                                            <span>Адрес </span>
                                            @if(!empty($contact->addresses))
                                                @foreach($contact->addresses as $add)
                                                    <p>
                                                        {{ $add->address_uz }}
                                                    </p>
                                                    @php break; @endphp
                                                @endforeach
                                            @endif
                                        </div>
                                        <div>
                                            <span>@lang('front.text.email'):</span>
                                            <p>
                                                <a href="mailto:{{ $contact->email }}" class="text-dark">{{ $contact->email }}</a>
                                            </p>
                                        </div>
                                        <div>
                                            <span>@lang('front.text.Phone')</span>
                                            <p>
                                                <a href="tel:{{ $contact->phone_1 }}" class="text-dark">{{ $contact->phone_1 }}</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- input form -->
            <div class="form-input">
                <div class="container">
                    <form action="" method="get">
                        <div class="form-content d-flex justify-content-between">
                            <div class="form-left">
                                <h4 class="text-capitalize">@lang('front.text.discuss_your_project')?</h4>
                                <div class="form-item">
                                    <input type="text" name="fio" id="Имя" autocomplete="off" required>
                                    <label for="username">@lang('front.text.Name')</label>
                                </div>
                                <div class="form-item">
                                    <input type="number" name="number" id="tel" autocomplete="off" required >
                                    <label for="tel">@lang('front.text.Phone')</label>
                                </div>
                                <div class="form-item">
                                    <input type="email" name="email" id="mail" autocomplete="off" required >
                                    <label for="mail">@lang('front.text.email')</label>
                                </div>
                                <div class="d-flex gap-2  justify-content-md-center justify-content-sm-center justify-content-lg-start">
                                    <input type="checkbox" id="ok" required>
                                    <label for="ok" class="ok-text">@lang('front.text.i_agre') <a href="#">@lang('front.text.terms_of_personal_data_processing')</a></label>
                                </div>
                            </div>
                            <div class="form-right">
                                <button class="circleBtn" >
                                    @lang('front.text.submit_an_application')
                                </button>
                                <img src="{{ asset("artColor/images/main-video-bg.png") }}" class="img-form" alt="form-img">
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
