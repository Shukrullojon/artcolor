@extends('layouts.app')

@section('content')

    <!-- main -->
    @if(count($sliders)>0)
        <div class="main">
            <div class="main-content">
                @foreach($sliders as $slider)
                    <div class="main-slider-item">
                        <div class="container">
                            <div class="main-slider d-flex justify-content-between align-items-end w-100">
                                <div class="main-left" data-aos="fade-up"  data-aos-duration="1500">
                                    <h1 class="text-white">{!! $slider->title !!}</h1>
                                    <h3 class="py-3">{!! $slider->title_short !!}</h3>
                                    <p class="text-white">
                                        {!! $slider->info !!}
                                    </p>
                                    <div class="about-us-btn">
                                        <a href="{!! $slider->button_url !!}" target="{!! $slider->button_target !!}">
                                            <button>{!! $slider->button !!}</button>
                                        </a>
                                    </div>
                                </div>
                                <div class="main-right" data-aos="fade-up"  data-aos-duration="1500">
                                    <img src="{{ asset('uploads/'.$slider->image_right)}}" class="img-fluid" alt="">
                                </div>
                            </div>

                            <div class="main-social d-flex pb-3 align-items-center">

                                <div class="main-social-app">
                                    <a href='https://telegram.me/share/url?url={{ $slider->button_url }}'>
                                        <i class="fab fa-telegram"></i>
                                    </a>
                                    <a href='https://www.facebook.com/sharer/sharer.php?u={{ $slider->button_url }}'>
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href='https://www.instagram.com/?url={{ $slider->button_url }}'>
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </div>

                                <div class="main-btn">
                                    <button class="prev pulse" onclick="previousSlide()">
                                        <i class="fas fa-solid fa-angle-left"></i>
                                    </button>
                                    <button class="next active pulse" onclick="nextSlide()">
                                        <i class="fas fa-solid fa-angle-right"></i>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
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

    <!-- main video data-bs-toggle="modal" data-bs-target="#exampleModal"-->
    @if(!empty($video))
        <div class="main-video d-flex justify-content-center align-items-center" style="background-image: url('{{ asset("uploads/".$video->image) }}');">
            <div class="video d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#exampleModal"  data-aos="flip-up"  data-aos-duration="1500">
                <i class="fas fa-solid fa-play" id="video" ></i>
            </div>
        </div>
    @endif
    <!-- main video -->
    @if(!empty($video))
        @section('video')
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" id="video-close" onclick="videoPause()" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <iframe id="videoframe"   src="{{ $video->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <!-- video modal -->
        @endsection
    @endif

    @if(count($productTypes)>0)
    <!-- forProduct -->
    <div class="forProduct">
        <div class="container">
            <div class="forProduct-content">
                @php $j=1 @endphp
                @foreach($productTypes as $pt)
                    <div class="forProduct-header d-flex justify-content-center justify-content-sm-between  align-items-center flex-wrap flex-sm-nowrap">
                        <div data-aos="fade-up"  data-aos-duration="1500">
                            <h1>{{ $pt->title }}</h1>
                        </div>
                        <div data-aos="fade-up"  data-aos-duration="1500">
                            <p>
                                {!! $pt->info !!}
                            </p>
                        </div>
                    </div>

                    <div class="forProduct-body my-5 d-flex justify-content-between align-items-center @if($j%2 == 0) flex-row-reverse @endif">
                        <div class="forProduct-left">
                            <div class="forProduct-img">
                                @php $i=1; @endphp

                                @foreach($pt->items as $pti)
                                    <img src="{{ asset('uploads/'.$pti->image)}}" class="@if($j%2 ==0) product-item-{{ $i++ }}@else product-item{{ $i++ }} @endif" alt="">
                                @endforeach
                                <div class="slide-product-content">
                                    @php
                                        $i=1;
                                        $duration = 1500;
                                    @endphp

                                    @foreach($pt->items as $pti)
                                        <div class="pulse slide-product-item item-{{ $i }} @if($j%2 ==0)item-1-{{$i}}@endif" data-aos="fade-up"  data-aos-duration="{{ $duration+500 }}">
                                            {{ $i++ }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="forProduct-right" data-aos="fade-up"  data-aos-duration="1500">
                            <h2>{{ $pt->title_short }}</h2>
                            <p>
                                {!! $pt->text !!}
                            </p>

                            <div class="forProduct-btn d-flex  gap-3 align-items-center py-3">
                                <button class="prevBtn pulse" onclick="@if($j%2==0)prevBtn() @else prevBtnOne() @endif">
                                    <i class="fas fa-solid fa-chevron-left"></i>
                                </button>
                                <span class="@if($j%2==0) answere @else answereOne @endif">1</span>
                                <button class="nextBtn pulse" onclick="@if($j%2==0)nextBtn() @else nextBtnOne() @endif">
                                    <i class="fas fa-solid fa-chevron-right"></i>
                                </button>
                            </div>

                            <div class="slide-p">
                                @php
                                    $numberString = [
                                        1 => "One",
                                        2 => "Two",
                                        3 => "Three",
                                        4 => "Four",
                                        5 => "Five",
                                        6 => "Six",
                                    ];
                                @endphp

                                @php
                                    $i=1;
                                    $lang = session('locale');
                                    if(strlen($lang)>2)
                                        $lang = "ru";
                                @endphp

                                @foreach($pt->items as $pti)
                                    <div class="@if($j%2 == 0) slide-p-item-{{ $i }} @else slide-p-item-{{ $numberString[$i] }} @endif @if($j%2 == 0) active @endif">
                                        <p>
                                            @if($lang == "uz")
                                                {{ $pti->title_uz }}
                                            @elseif($lang == "ru")
                                                {{ $pti->title_ru }}
                                            @else
                                                {{ $pti->title_en }}
                                            @endif
                                        </p>
                                    </div>
                                    @php $i++ @endphp
                                @endforeach

                            </div>
                            <div class="about-us-btn" data-aos="fade-up"  data-aos-duration="1500">
                                <a href="{{ $pt->button_url }}"><button>@lang('front.text.more')</button></a>
                            </div>
                        </div>
                    </div>
                    @php $j++; @endphp
                @endforeach
                <!-- next content -->

                <div style="display:none">
                <div class="forProduct-header d-flex justify-content-center justify-content-sm-between  align-items-center flex-wrap flex-sm-nowrap">
                    <div data-aos="fade-up"  data-aos-duration="1500">
                        <h1>АКРИЛОВЫЕ И СИЛИКОНОВЫЕ ШТУКАТУРКИ</h1>
                    </div>
                    <div data-aos="fade-up"  data-aos-duration="1500">
                        <p>
                            ILLUSION — гладкий материал с эффектом бархата и искристо-перламутровым переливом, изысканное и простое решение для практически любого интерьера
                        </p>
                    </div>
                </div>
                <div class="forProduct-body my-5 d-flex justify-content-between align-items-center flex-row-reverse">
                    <div class="forProduct-left">
                        <div class="forProduct-img">
                            <img src="{{ asset('artColor/images/forProduct.png')}}" class=" product-item-1" alt="">
                            <img src="{{ asset('artColor/images/about-right.png')}}" class=" product-item-2" alt="">
                            <img src="{{ asset('artColor/images/main.png')}}" class=" product-item-3"  alt="">
                            <img src="{{ asset('artColor/images/forProduct.png')}}" class=" product-item-4" alt="">
                            <img src="{{ asset('artColor/images/about-right.png')}}" class=" product-item-5" alt="">
                            <img src="{{ asset('artColor/images/forProduct.png')}}" class=" product-item-6" alt="">
                            <div class="slide-product-content">
                                <div class="pulse slide-product-item item-1 item-1-1" data-aos="fade-up"  data-aos-duration="1500">
                                    1
                                </div>
                                <div class="pulse slide-product-item item-2 item-1-2" data-aos="fade-up"  data-aos-duration="2000">
                                    2
                                </div>
                                <div class="pulse slide-product-item item-3 item-1-3" data-aos="fade-up"  data-aos-duration="2500">
                                    3
                                </div>
                                <div class="pulse slide-product-item item-4 item-1-4"data-aos="fade-up"  data-aos-duration="3000" >
                                    4
                                </div>
                                <div class="pulse slide-product-item item-5 item-1-5"data-aos="fade-up"  data-aos-duration="3000" >
                                    5
                                </div>
                                <div class="pulse slide-product-item item-6 item-1-6"data-aos="fade-up"  data-aos-duration="3000" >
                                    6
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="forProduct-right" data-aos="fade-up"  data-aos-duration="1500">
                        <h2>ШТУКАТУРКИ НА ОСНОВЕ ГАШЕНОЙ ИЗВЕСТИ</h2>
                        <p>
                            Натуральность и естественность на первом месте. Высокая прочность и стойкость к загрязнениям. Благодаря щелочи, входящей в состав материала, обеспечивается высокая паропроницаемость и бактерицидные свойства, предотвращая появление плесени и грибка.
                        </p>
                        <div class="forProduct-btn d-flex  gap-3 align-items-center py-3">
                            <button class="prevBtn pulse" onclick="prevBtn()">
                                <i class="fas fa-solid fa-chevron-left"></i>
                            </button>
                            <span class="answere">1</span>
                            <button class="nextBtn pulse" onclick="nextBtn()">
                                <i class="fas fa-solid fa-chevron-right"></i>
                            </button>
                        </div>
                        <div class="slide-p">
                            <div class="slide-p-item-1 active">
                                <p>
                                    Натуральность и естественность на первом месте. Высокая прочность и стойкость к загрязнениям. Благодаря щелочи, входящей в состав материала
                                </p>
                            </div>
                            <div class="slide-p-item-2">
                                <p>
                                    Натуральность и естественность на первом месте. Высокая прочность и стойкость к загрязнениям. Благодаря щелочи, входящей в состав материала - 2
                                </p>
                            </div>
                            <div class="slide-p-item-3">
                                <p>
                                    Натуральность и естественность на первом месте. Высокая прочность и стойкость к загрязнениям. Благодаря щелочи, входящей в состав материала - 3
                                </p>
                            </div>
                            <div class="slide-p-item-4">
                                <p>
                                    Натуральность и естественность на первом месте. Высокая прочность и стойкость к загрязнениям. Благодаря щелочи, входящей в состав материала - 4
                                </p>
                            </div>
                            <div class="slide-p-item-5">
                                <p>
                                    Натуральность и естественность на первом месте. Высокая прочность и стойкость к загрязнениям. Благодаря щелочи, входящей в состав материала - 5
                                </p>
                            </div>
                            <div class="slide-p-item-6">
                                <p>
                                    Натуральность и естественность на первом месте. Высокая прочность и стойкость к загрязнениям. Благодаря щелочи, входящей в состав материала - 6
                                </p>
                            </div>
                        </div>
                        <div class="about-us-btn" data-aos="fade-up"  data-aos-duration="1500">
                            <a href="pages/galleryAll.html"><button>Подробнее</button></a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- forProduct -->
    @endif

    @if(count($subs))
        <!-- product card item -->
        <div class="cards">
            <div class="container">
                <h2 class="text-capitalize" data-aos="fade-up"  data-aos-duration="1500">@lang('front.sidebar.product')</h2>
                <form onchange="filterCard()">
                    <div class="card-head d-flex justify-content-between justify-content-sm-center align-items-center">
                        @php $sum = 500 @endphp
                        @foreach($subs as $sub)
                            <div class="card-head-item sub_category" data-aos="fade-up" data-card="{{ $sub->id }}"  data-aos-duration="{{ $sum+500 }}">
                                <label for="" class="sub_category" data-card="{{ $sub->id }}">
                                    <input type="radio" name="card-filter" id="card-input" data-value="{{ $sub->id }}">
                                    <h6>{{ $sub->title }}</h6>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </form>

                <div class="card-foot d-flex  align-items-center flex-wrap gap-4">
                    @foreach($products as $product)
                        <a href="{{ route("productitem",$product->id) }}" class = "card-foot-item-a" data-card-id="{{ $product->filter_id }}">
                            <div class="card-foot-item">
                                <div class="card-shape-hover"></div>
                                <div class="card-img text-center">
                                    @if(!empty($product->image))
                                        <img src="{{ asset('uploads/'.$product->image->image)}}" class="img-fluid" alt="">
                                    @endif
                                </div>
                                <h5>{{ $product->title }}</h5>
                                <p>
                                    <span>{{ $product->application }}</span>
                                    <span><b>{{ $product->compound }}</b></span>
                                </p>
                                <div class="card-shape-hover-1"></div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="about-us-btn text-center my-4" data-aos="fade-up"  data-aos-duration="1500">
                    <a href="{{ route("product") }}">
                        <button>@lang('front.text.view_all')</button>
                    </a>
                </div>
            </div>
        </div>
        <!-- product card item -->
    @endif

    @if(!empty($work))
        <!-- our work -->
        <div class="our-work">
            <div class="container">
                <div class="our-work-content d-flex justify-content-between text-white gap-3">
                    <div class="our-left">
                        <h3 data-aos="fade-up" data-aos-duration="1500">@lang('front.text.our_work')</h3>
                        <p>{{ $work->title }}</p>

                        @if(count($workitems))
                            <div class="our-product-content-item">
                                @foreach($workitems as $workitem)
                                    <div class="our-product-item @if ($loop->first) active @endif">
                                        <h4>{{ $workitem->name }}</h4>
                                        <p class="about-product">
                                            <span>{{ $workitem->region }}</span>
                                            <span>{{ $workitem->application }}</span>
                                        </p>
                                        <div class="py-3">
                                            <img src="{{ asset('uploads/'.$workitem->product_image)}}" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="our-right">
                        <div class="our-right-content">
                            @foreach($workitems as $workitem)
                                <div class="our-right-item nextOur @if ($loop->first) activeItem @endif">
                                    <img src="{{ asset('uploads/'.$workitem->image)}}" alt="">
                                </div>
                            @endforeach
                        </div>

                        <div class="our-right-btn">
                            <button class="prevOurBtn pulse" >
                                <span>&#10094;</span>
                            </button>
                            <button class="nextOurBtn pulse">
                                <span>&#10095;</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- our work -->
    @endif


    @if(count($news))
        <!-- blog -->
        <div class="blog ">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 blog-texts">
                        <h2 class="text-capitalize" data-aos="fade-up" data-aos-duration="1500">Новости и блог</h2>
                    </div>
                    <div class="col-sm-6 blog-btns">
                        <div class="swiper-button-prev pulse"></div>
                        <div class="swiper-button-next pulse"></div>
                    </div>
                </div>

                <section class="swiper">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($news as $new)
                                <div class="swiper-slide">
                                    <a href="{{ route("blogitem",$new->id) }}">
                                        <div class="splide-card-item">
                                            <img src="{{ asset('artColor/images/forProduct.png')}}"  alt="">
                                            <h5>{{ $new->title }}</h5>
                                            <div class="date-content d-flex justify-content-between">
                                                <div class="date">{{ date("Y-m-d",strtotime($new->updated_at)) }}</div>
                                                <div class="blog-text">@if($new->type == 1) @lang('front.text.new') @else @lang('front.text.blog') @endif</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- blog -->
    @endif

    <!-- input form -->
    <div class="form-input">
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

@endsection

@section('scripts')
    <script>
        $(document).on("click",".sub_category",function(){
           var sub_id = $(this).attr("data-card");
           alert(sub_id);
        });
    </script>
@endsection

@section('swiper')
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
@endsection
