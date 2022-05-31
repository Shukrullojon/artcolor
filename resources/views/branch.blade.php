@extends('layouts.app_second')

@section('content')

    @if(!empty($header))
        <!-- main -->
        <div class="main py-5">
            <div class="container">
                <div class="main-content">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route("home") }}">@lang('front.sidebar.home')</a></li>
                            <li class="breadcrumb-item"><a href="{{ route("buypage") }}">@lang('front.text.Where_could_I_buy')</a></li>
                            <li class="breadcrumb-item active" ><a href="{{ route("blog") }}">@lang('front.text.News_events')</a></li>
                        </ol>
                    </nav>
                    <h4  data-aos="fade-up" data-aos-duration="1500">
                        {{ $header->title }}
                    </h4>

                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <p  data-aos="fade-up" data-aos-duration="1500">
                                {{ $header->info }}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <div class="about-us-btn"  data-aos="fade-up" data-aos-duration="1500">
                                <a href="{{ $header->button_url }}">
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


    <!-- section branch form -->
    <div class="section-branch" style="background-image: url('{{ asset("artColor/images/branch-bg.png") }}');">
        <div class="container">

            <div class="section-branch-content row">
                @if(!empty($about))
                    <div class="col-lg-4 col-md-4">
                        <h3  data-aos="fade-up" data-aos-duration="1500">{{ $about->title }}</h3>
                        <p  data-aos="fade-up" data-aos-duration="1500">
                            {!! $about->info !!}
                        </p>
                    </div>
                @endif

                <div class="col-lg-7 offset-lg-1 col-md-8 offset-md-0" >
                    <form action="" method="get">
                        <div class=" branch-right-form d-flex flex-wrap" >
                            <div class="form-item">
                                <input type="text" name="fio" id="Имя" autocomplete="off" required>
                                <label for="username">@lang('front.text.Name')</label>
                            </div>
                            <div class="form-item">
                                <input type="email" name="email" id="mail" autocomplete="off" required >
                                <label for="mail">@lang('front.text.email')</label>
                            </div>
                            <div class="form-item">
                                <input type="number" name="number" id="tel" autocomplete="off" required >
                                <label for="tel">@lang('front.text.Phone')</label>
                            </div>
                            <br>
                            <div class="d-flex gap-2  justify-content-md-center justify-content-sm-center justify-content-lg-start">
                                <input type="checkbox" id="ok">
                                <label for="ok" class="ok-text">@lang('front.text.i_agre') <a href="#">@lang('front.text.terms_of_personal_data_processing')</a></label>
                            </div>
                            <button class="circleBtn">
                                @lang('front.text.submit_an_application')
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- section branch form -->


@endsection
