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
    @if(!empty($about) and !empty($about->video_image))
        <div class="main-video d-flex justify-content-center align-items-center" style="background-image: url('{{ asset("uploads/".$about->video_image) }}');">
            <div class="video d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#exampleModal"  data-aos="flip-up"  data-aos-duration="1500">
                <i class="fas fa-solid fa-play" id="video" ></i>
            </div>
        </div>
    @endif
    <!-- main video -->
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

    <!-- forProduct -->
    <div class="forProduct">
        <div class="container">
            <div class="forProduct-content">

                <div class="forProduct-header d-flex justify-content-center justify-content-sm-between  align-items-center flex-wrap flex-sm-nowrap">
                    <div data-aos="fade-up"  data-aos-duration="1500">
                        <h1>Особенности наших декоративных покрытий</h1>
                    </div>
                    <div data-aos="fade-up"  data-aos-duration="1500">
                        <p>
                            ART STONE — наша новинка, покрытие, позволяющее добиться имитации натурального камня и скалистых пород, идеальное решение для любителей классики, рустикального стиля и тех, кто следит за эко-трендами.
                        </p>
                    </div>
                </div>

                <div class="forProduct-body my-5 d-flex justify-content-between align-items-center">
                    <div class="forProduct-left">

                        <div class="forProduct-img">
                            <img src="{{ asset('artColor/images/forProduct.png')}}" class="product-item1" alt="">
                            <img src="{{ asset('artColor/images/about-right.png')}}" class="product-item2" alt="">
                            <img src="{{ asset('artColor/images/main.png')}}" class="product-item3" alt="">
                            <img src="{{ asset('artColor/images/forProduct.png')}}" class="product-item4" alt="">
                            <img src="{{ asset('artColor/images/about-right.png')}}" class="product-item5"  alt="">
                            <img src="{{ asset('artColor/images/forProduct.png')}}" class="product-item6"  alt="">

                            <div class="slide-product-content">
                                <div class="pulse slide-product-item item-1" data-aos="fade-up"  data-aos-duration="1500">
                                    1
                                </div>
                                <div class="pulse slide-product-item item-2" data-aos="fade-up"  data-aos-duration="2000">
                                    2
                                </div>
                                <div class="pulse slide-product-item item-3" data-aos="fade-up"  data-aos-duration="2500">
                                    3
                                </div>
                                <div class="pulse slide-product-item item-4" data-aos="fade-up"  data-aos-duration="3000">
                                    4
                                </div>
                                <div class="pulse slide-product-item item-5" data-aos="fade-up"  data-aos-duration="3000">
                                    5
                                </div>
                                <div class="pulse slide-product-item item-6" data-aos="fade-up"  data-aos-duration="3000">
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
                            <button class="prevBtn pulse" onclick="prevBtnOne()">
                                <i class="fas fa-solid fa-chevron-left"></i>
                            </button>
                            <span class="answereOne">1</span>
                            <button class="nextBtn pulse" onclick="nextBtnOne()">
                                <i class="fas fa-solid fa-chevron-right"></i>
                            </button>
                        </div>

                        <div class="slide-p">
                            <div class="slide-p-item-One">
                                <p>
                                    Натуральность и естественность на первом месте. Высокая прочность и стойкость к загрязнениям. Благодаря щелочи, входящей в состав материала
                                </p>
                            </div>
                            <div class="slide-p-item-Two">
                                <p>
                                    Натуральность и естественность на первом месте. Высокая прочность и стойкость к загрязнениям. Благодаря щелочи, входящей в состав материала 2
                                </p>
                            </div>
                            <div class="slide-p-item-Three">
                                <p>
                                    Натуральность и естественность на первом месте. Высокая прочность и стойкость к загрязнениям. Благодаря щелочи, входящей в состав материала 3
                                </p>
                            </div>
                            <div class="slide-p-item-Four">
                                <p>
                                    Натуральность и естественность на первом месте. Высокая прочность и стойкость к загрязнениям. Благодаря щелочи, входящей в состав материала 4
                                </p>
                            </div>
                            <div class="slide-p-item-Five">
                                <p>
                                    Натуральность и естественность на первом месте. Высокая прочность и стойкость к загрязнениям. Благодаря щелочи, входящей в состав материала 5
                                </p>
                            </div>
                            <div class="slide-p-item-Six">
                                <p>
                                    Натуральность и естественность на первом месте. Высокая прочность и стойкость к загрязнениям. Благодаря щелочи, входящей в состав материала 6
                                </p>
                            </div>
                        </div>
                        <div class="about-us-btn" data-aos="fade-up"  data-aos-duration="1500">
                            <a href="pages/kraska.html"><button>Подробнее</button></a>
                        </div>


                    </div>
                </div>

                <!-- next content -->

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
    <!-- forProduct -->

    <!-- product card item -->
    <div class="cards">
        <div class="container">
            <h2 class="text-capitalize" data-aos="fade-up"  data-aos-duration="1500">Продукция</h2>
            <form onchange="filterCard()">
                <div class="card-head d-flex justify-content-between justify-content-sm-center align-items-center">
                    <div class="card-head-item" data-aos="fade-up" data-card="1"  data-aos-duration="500">
                        <label for="">
                            <input type="radio" name="card-filter" id="card-input" data-value="1">
                            <h6>Цветные краски</h6>
                        </label>
                    </div>
                    <div class="card-head-item" data-aos="fade-up" data-card="2"  data-aos-duration="1000">
                        <label for="">
                            <input type="radio" name="card-filter" id="card-input" data-value="2">
                            <h6>Масляная</h6>
                        </label>
                    </div>
                    <div class="card-head-item" data-aos="fade-up" data-card="3"  data-aos-duration="1500">
                        <label for="">
                            <input type="radio" name="card-filter" id="card-input" data-value="3">
                            <h6>Водоэмульсионная</h6>
                        </label>
                    </div>
                    <div class="card-head-item" data-aos="fade-up" data-card="4"  data-aos-duration="2000">
                        <label for="">
                            <input type="radio" name="card-filter" id="card-input" data-value="4">
                            <h6>Силикатная</h6>
                        </label>
                    </div>
                    <div class="card-head-item" data-aos="fade-up" data-card="5"  data-aos-duration="2500">
                        <label for="">
                            <input type="radio" name="card-filter" id="card-input" data-value="5">
                            <h6>Алкидные</h6>
                        </label>
                    </div>
                    <div class="card-head-item" data-aos="fade-up" data-card="6"  data-aos-duration="3000">
                        <label for="">
                            <input type="radio" name="card-filter" id="card-input" data-value="6">
                            <h6>Эмалевая</h6>
                        </label>
                    </div>
                    <div class="card-head-item" data-aos="fade-up" data-card="7"  data-aos-duration="3000">
                        <label for="">
                            <input type="radio" name="card-filter" id="card-input" data-value="7">
                            <h6>Силиконовые</h6>
                        </label>
                    </div>
                </div>
            </form>

            <div class="card-foot d-flex  align-items-center flex-wrap gap-4">

                <a href="pages/product-item.html" class="card-foot-item-a" data-card-id="1">
                    <div class="card-foot-item">
                        <div class="card-shape-hover"></div>
                        <div class="card-img text-center">
                            <img src="{{ asset('artColor/images/card-item-1.png')}}" class="img-fluid" alt="">
                        </div>
                        <h5>LAK</h5>
                        <p>
                            <span>Область применения:</span>
                            <span><b>Интерьер, широкий спектр</b></span>
                        </p>
                        <div class="card-shape-hover-1"></div>
                    </div>
                </a>
                <a href="pages/product-item.html" class="card-foot-item-a" data-card-id="2">
                    <div class="card-foot-item">
                        <div class="card-img text-center">
                            <img src="{{ asset('artColor/images/card-item-2.png')}}" class="img-fluid" alt="">
                        </div>
                        <h5>Encanto</h5>
                        <p>
                            <span>Область применения:</span>
                            <span><b>Интерьер, широкий спектр</b></span>
                        </p>
                    </div>
                </a>
                <a href="pages/product-item.html" class="card-foot-item-a" data-card-id="3">
                    <div class="card-foot-item">
                        <div class="card-img text-center">
                            <img src="{{ asset('artColor/images/card-item-3.png')}}" class="img-fluid" alt="">
                        </div>
                        <h5>JOKER</h5>
                        <p>
                            <span>Область применения:</span>
                            <span><b>Интерьер, широкий спектр</b></span>
                        </p>
                    </div>
                </a>
                <a href="pages/product-item.html" class="card-foot-item-a" data-card-id="7">
                    <div class="card-foot-item">
                        <div class="card-img text-center">
                            <img src="{{ asset('artColor/images/card-item-4.png')}}" class="img-fluid" alt="">
                        </div>
                        <h5>POWER 7</h5>
                        <p>
                            <span>Область применения:</span>
                            <span><b>Интерьер, широкий спектр</b></span>
                        </p>
                    </div>
                </a>
                <a href="pages/product-item.html" class="card-foot-item-a" data-card-id="6">
                    <div class="card-foot-item">
                        <div class="card-img text-center">
                            <img src="{{ asset('artColor/images/card-item-5.png')}}" class="img-fluid" alt="">
                        </div>
                        <h5>LAK</h5>
                        <p>
                            <span>Область применения:</span>
                            <span><b>Интерьер, широкий спектр</b></span>
                        </p>
                    </div>
                </a>
                <a href="pages/product-item.html" class="card-foot-item-a" data-card-id="5">
                    <div class="card-foot-item">
                        <div class="card-img text-center">
                            <img src="{{ asset('artColor/images/card-item-6.png')}}" class="img-fluid" alt="">
                        </div>
                        <h5>Encanto</h5>
                        <p>
                            <span>Область применения:</span>
                            <span><b>Интерьер, широкий спектр</b></span>
                        </p>
                    </div>
                </a>
                <a href="pages/product-item.html" class="card-foot-item-a" data-card-id="4">
                    <div class="card-foot-item">
                        <div class="card-img text-center">
                            <img src="{{ asset('artColor/images/card-item-7.png')}}" class="img-fluid" alt="">
                        </div>
                        <h5>JOKER</h5>
                        <p>
                            <span>Область применения:</span>
                            <span><b>Интерьер, широкий спектр</b></span>
                        </p>
                    </div>
                </a>
                <a href="pages/product-item.html" class="card-foot-item-a" data-card-id="1">
                    <div class="card-foot-item">
                        <div class="card-img text-center">
                            <img src="{{ asset('artColor/images/card-item-8.png')}}" class="img-fluid" alt="">
                        </div>
                        <h5>POWER 7</h5>
                        <p>
                            <span>Область применения:</span>
                            <span><b>Интерьер, широкий спектр</b></span>
                        </p>
                    </div>
                </a>

            </div>

            <div class="about-us-btn text-center my-4" data-aos="fade-up"  data-aos-duration="1500">
                <a href="pages/card-item.html">
                    <button>Посмотреть все</button>
                </a>
            </div>


        </div>
    </div>
    <!-- product card item -->

    <!-- our work -->
    <div class="our-work">
        <div class="container">
            <div class="our-work-content d-flex justify-content-between text-white gap-3">
                <div class="our-left">
                    <h3 data-aos="fade-up" data-aos-duration="1500">Наши работы</h3>
                    <p>Идеальным можно назвать интерьер, в котором гармонично сочетаются все, даже мельчайшие детали. Посмотрите реализованные нашими специалистами проекты.</p>

                    <div class="our-product-content-item">
                        <div class="our-product-item active">
                            <h4>Encanto</h4>
                            <p class="about-product">
                                <span>Область применения:</span>
                                <span>Интерьер, широкий спектр</span>
                            </p>

                            <div class="py-3">
                                <img src="{{ asset('artColor/images/card-item-2.png')}}" class="img-fluid" alt="">
                            </div>
                        </div>

                        <div class="our-product-item">
                            <h4>Lak</h4>
                            <p class="about-product">
                                <span>Область применения:</span>
                                <span>Интерьер, широкий спектр</span>
                            </p>

                            <div class="py-3">
                                <img src="{{ asset('artColor/images/card-item-3.png')}}" class="img-fluid" alt="">
                            </div>
                        </div>

                        <div class="our-product-item">
                            <h4>Encanto</h4>
                            <p class="about-product">
                                <span>Область применения:</span>
                                <span>Интерьер, широкий спектр</span>
                            </p>

                            <div class="py-3">
                                <img src="{{ asset('artColor/images/card-item-4.png')}}" class="img-fluid" alt="">
                            </div>
                        </div>

                        <div class="our-product-item">
                            <h4>Encanto</h4>
                            <p class="about-product">
                                <span>Область применения:</span>
                                <span>Интерьер, широкий спектр</span>
                            </p>

                            <div class="py-3">
                                <img src="{{ asset('artColor/images/card-item-4.png')}}" class="img-fluid" alt="">
                            </div>
                        </div>

                    </div>

                </div>

                <div class="our-right">

                    <div class="our-right-content">

                        <div class="our-right-item nextOur activeItem">
                            <img src="{{ asset('artColor/images/forProduct.png')}}" alt="">
                        </div>

                        <div class="our-right-item nextOur nextItem">
                            <img src="{{ asset('artColor/images/our-item.png')}}" alt="">
                        </div>
                        <div class="our-right-item nextOur ">
                            <img src="{{ asset('artColor/images/about-right.png')}}" alt="">
                        </div>
                        <div class="our-right-item nextOur">
                            <img src="{{ asset('artColor/images/main.png')}}" alt="">
                        </div>

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

                        <div class="swiper-slide">
                            <a href="pages/blog.html">
                                <div class="splide-card-item">
                                    <img src="{{ asset('artColor/images/forProduct.png')}}"  alt="">
                                    <h5>С ЧЕГО НАЧАТЬ РЕМОНТ В НОВОСТРОЙКЕ?</h5>
                                    <div class="date-content d-flex justify-content-between">
                                        <div class="date">23 марта 2022 г.</div>
                                        <div class="blog-text">блог</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="pages/blog.html">
                                <div class="splide-card-item">
                                    <img src="{{ asset('artColor/images/about-right.png')}}"  alt="">
                                    <h5>С ЧЕГО НАЧАТЬ РЕМОНТ В НОВОСТРОЙКЕ?</h5>
                                    <div class="date-content d-flex justify-content-between">
                                        <div class="date">23 марта 2022 г.</div>
                                        <div class="blog-text">блог</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="pages/blog.html">
                                <div class="splide-card-item">
                                    <img src="{{ asset('artColor/images/our-item.png')}}"  alt="">
                                    <h5>С ЧЕГО НАЧАТЬ РЕМОНТ В НОВОСТРОЙКЕ?</h5>
                                    <div class="date-content d-flex justify-content-between">
                                        <div class="date">23 марта 2022 г.</div>
                                        <div class="blog-text">блог</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="pages/blog.html">
                                <div class="splide-card-item">
                                    <img src="{{ asset('artColor/images/about-right.png')}}"  alt="">
                                    <h5>С ЧЕГО НАЧАТЬ РЕМОНТ В НОВОСТРОЙКЕ?</h5>
                                    <div class="date-content d-flex justify-content-between">
                                        <div class="date">23 марта 2022 г.</div>
                                        <div class="blog-text">блог</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="pages/blog.html">
                                <div class="splide-card-item">
                                    <img src="{{ asset('artColor/images/forProduct.png')}}"  alt="">
                                    <h5>С ЧЕГО НАЧАТЬ РЕМОНТ В НОВОСТРОЙКЕ?</h5>
                                    <div class="date-content d-flex justify-content-between">
                                        <div class="date">23 марта 2022 г.</div>
                                        <div class="blog-text">блог</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="pages/blog.html">
                                <div class="splide-card-item">
                                    <img src="{{ asset('artColor/images/our-item.png')}}"  alt="">
                                    <h5>С ЧЕГО НАЧАТЬ РЕМОНТ В НОВОСТРОЙКЕ?</h5>
                                    <div class="date-content d-flex justify-content-between">
                                        <div class="date">23 марта 2022 г.</div>
                                        <div class="blog-text">блог</div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </section>

        </div>
    </div>
    <!-- blog -->

@endsection
