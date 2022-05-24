@extends('layouts.app')

@section('content')

    <!-- main -->
    <div class="mainPage" style="background-image: url('{{ asset('artColor/images/main-video-bg.png') }}')">
        <div class="mainPage-bg">
            <div class="container">

                <div class="mainPage-content">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route("index") }}">@lang('front.sidebar.home')</a></li>
                            <li class="breadcrumb-item active" ><a href="{{ route("product") }}">@lang('front.sidebar.product')</a></li>
                        </ol>
                    </nav>
                    <h4 data-aos="fade-up" data-aos-duration="1500">@lang('front.sidebar.product_category')</h4>
                </div>

            </div>
        </div>
    </div>
    <!-- main -->

    @php $i=0; @endphp
    @if(count($categories)>0)
        @foreach($categories as $category)
            <!-- section 2 -->
            <div class="section section-2">
                <div class="container">
                    <div class="row">
                        @if($i % 2 == 0)
                            <div class="col-lg-8 col-md-6">
                                <img src="{{ asset("uploads/".$category->image) }}"  alt="">
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <h3 data-aos="fade-up" data-aos-duration="1500">{{ $category->title }}</h3>
                                <p data-aos="fade-up" data-aos-duration="1500">
                                    {!! $category->info !!}
                                </p>

                                @if($category->colls == 1)
                                    <div class="product-Ul-1 d-flex justify-content-md-between" data-aos="fade-up"  data-aos-duration="1500">
                                        <div class="product-ul-left">
                                            <ul>
                                                @foreach($category->items as $item)
                                                    <li><p>{{ $item->title_uz }}</p></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="allBtn-block">
                                            <a href="kraska.html">
                                                <button class="allBtn yellow">
                                                    Подробнее
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                @if($category->colls == 2)
                                    <div class="product-ul-left" data-aos="fade-up"  data-aos-duration="1500">
                                        <ul>
                                            @foreach($category->items() as $item)
                                                <li><p>{{ $item->title_uz }}</p></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="allBtn-block">
                                        <a href="#">
                                            <button class="allBtn">
                                                Подробнее
                                            </button>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="col-lg-4 col-md-6">
                                <h3 data-aos="fade-up" data-aos-duration="1500">{{ $category->title }}</h3>
                                <p data-aos="fade-up" data-aos-duration="1500">
                                    {!! $category->info !!}
                                </p>

                                @if($category->colls == 1)
                                    <div class="product-Ul-1 d-flex justify-content-md-between" data-aos="fade-up"  data-aos-duration="1500">
                                        <div class="product-ul-left">
                                            <ul>
                                                @foreach($category->items as $item)
                                                    <li><p>{{ $item->title_uz }}</p></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="allBtn-block">
                                            <a href="kraska.html">
                                                <button class="allBtn yellow">
                                                    Подробнее
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                @if($category->colls == 2)
                                    <div class="product-ul-left" data-aos="fade-up"  data-aos-duration="1500">
                                        <ul>
                                            @foreach($category->items() as $item)
                                                <li><p>{{ $item->title_uz }}</p></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="allBtn-block">
                                        <a href="#">
                                            <button class="allBtn">
                                                Подробнее
                                            </button>
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-8 col-md-6">
                                <img src="{{ asset("uploads/".$category->image) }}"  alt="">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- section 2 -->
            @php $i ++ @endphp
        @endforeach
    @endif

    <!-- pages About -->
    <div class="pagesAbout">
        <div class="container">

            <h3 data-aos="fade-up" data-aos-duration="1500">КАТАЛОГ ПРОДУКТОВ</h3>

            <p data-aos="fade-up" data-aos-duration="1500">
                Создавая новые материалы, наши специалисты всегда ориентируются на последние мировые тенденции в декоре и дизайне.
            </p>

            <p data-aos="fade-up" data-aos-duration="1500">
                Мы гордимся, что первыми в Украине освоили производство декоративных покрытий на основе высококачественной извести. В состав этих материалов входят только натуральные компоненты и используются старинные рецепты. За последние годы мы заняли свою нишу во всех сегментах рынка: начиная с профессиональных авторских интерьеров, заканчивая более бюджетными тендерными объектами и демократичными ремонтами. Все материалы изготавливаются из самого лучшего, экологически чистого сырья Premium-класса. Основные компоненты декоративных покрытий импортируются на нашу производственную базу из Италии, Испании, Германии и Франции.
            </p>

            <p data-aos="fade-up" data-aos-duration="1500"><b>Новые покрытия</b></p>
            <p data-aos="fade-up" data-aos-duration="1500">
                В состав декоративных материалов входят только натуральные компоненты и используются старинные рецепты. Благодаря этому создана группа наших самых популярных покрытий - таких как GROTTO, TRAVERTINO STYLE и MARMARINO STYLE. На данный момент мы работаем в направлении расширения ассортимента декоративных покрытий на основе извести.
            </p>

            <p data-aos="fade-up" data-aos-duration="1500"><b>Качественный продукт</b></p>
            <p data-aos="fade-up" data-aos-duration="1500">
                Исходя из всего вышесказанного, мы с уверенностью можем заявить, что выбирая продукцию ТМ «Elf Decor», вы получаете продукт великолепного качества, в создании которого принимает участие высококвалифицированная команда фанатов своего дела, при производстве которого используются лучшие рецептуры и высококачественное сырье, продукт, соотношение цена-качество которого выгодно отличается на фоне своих аналогов.

            </p>

        </div>
    </div>
    <!-- pages About -->

@endsection
