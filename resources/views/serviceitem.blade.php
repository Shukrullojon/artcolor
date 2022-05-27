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
                            <li class="breadcrumb-item"><a href="{{ route("service") }}">@lang('front.sidebar.service')</a></li>
                        </ol>
                    </nav>
                    <h4 data-aos="fade-up" data-aos-duration="1500" >
                        {{ $header->title }}
                    </h4>

                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <p>
                            </p>
                        </div>
                        <div class="col-md-4"data-aos="fade-up" data-aos-duration="1500">
                            <div class="about-us-btn">
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

    @if(count($serviceitems))
        <!-- about -->
        <div class="about  my-3 servise-item ">
            <div class="container">
                @php $i=0; @endphp
                @foreach($serviceitems as $serviceitem)
                    @if($i % 2 == 0)
                        <div class="about-content">
                            <div class="about-left">
                                <h1 data-aos="fade-up" data-aos-duration="1500">{{ $serviceitem->title }}</h1>
                                {{ $serviceitem->info }}
                            </div>
                            <div class="about-right">
                                <div class="about-img ">
                                    <img src="{{ asset("uploads/".$serviceitem->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="about-content about-page-content-2">
                            <div class="about-right">
                                <div class="about-img">
                                    <img src="{{ asset("uploads/".$serviceitem->image) }}" alt="">
                                </div>
                            </div>
                            <div class="about-left">
                                <h1 data-aos="fade-up" data-aos-duration="1500">{{ $serviceitem->title }}</h1>
                                {{ $serviceitem->info }}
                            </div>
                        </div>
                    @endif
                    @php $i++ @endphp
                @endforeach
            </div>
        </div>
        <!-- about -->
    @endif


    <!-- input form -->
    <div class="form-input servise-item-form">
        <div class="container">
            <form action="" method="get">
                <div class="form-content d-flex justify-content-between">
                    <div class="form-left" >
                        <h4 class="text-capitalize" data-aos="fade-up" data-aos-duration="1500">@lang('front.text.discuss_your_project')?</h4>
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
                        <button class="circleBtn" type="submit">
                            @lang('front.text.submit_an_application')
                        </button>
                        @if(!empty($image))
                            <img src="{{ asset("uploads/".$image->image) }}" class="img-form"  alt="">
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- input form -->

@endsection
