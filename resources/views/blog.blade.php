@extends('layouts.app_second')

@section('content')
<!-- main -->
<div class="main py-5">
    <div class="container">
        <div class="main-content">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../index.html">Главная</a></li>
                    <li class="breadcrumb-item active" ><a href="blog.html">Новости и События</a></li>
                </ol>
            </nav>
            <h4 data-aos="fade-up" data-aos-duration="1500" >
                НОВОСТИ И СОБЫТИЯ
            </h4>

            <div class="row align-items-center">
                <div class="col-md-8" >
                    <p data-aos="fade-up" data-aos-duration="1500" >
                        Подписывайтесь и получайте наиболее актуальную информацию о новинках нашей
                        продукции, о проводимых выставках компании и просто интересные новости без лишнего спама.
                    </p>
                </div>
                <div class="col-md-4">
                    <div class="about-us-btn"data-aos="fade-up" data-aos-duration="1500" >
                        <a href="buyPage.html">
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

<!-- section blog -->
<div class="section-blog">
    <div class="container">

        <div class="section-blog-content">
            <div class="section-blog-header">
                <div class="blog-left" >
                    <p data-aos="fade-up" data-aos-duration="1500" >КАТЕГОРИИ</p>
                </div>
                <div class="blog-right" >
                    <ul data-aos="fade-up" data-aos-duration="1500" >
                        <li class="tab-button active" data-id="1" >ВСЕ</li>
                        @if(count($categoryNew))
                            @foreach($categoryNew as $cn)
                                <li class="tab-button" data-id="{{ $cn->id }}">{{ $cn->name }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>

            @if(count($categoryNew))

            @endif
        </div>

    </div>
</div>
<!-- section blog -->

@endsection
