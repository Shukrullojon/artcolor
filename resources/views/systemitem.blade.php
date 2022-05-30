@extends('layouts.app')

@section('content')

    <!-- main -->
    <div class="mainPage" style="background-image: url(../images/gallery-bg.png);">
        <div class="mainPage-bg">
            <div class="container">

                <div class="mainPage-content">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index.html">Главная</a></li>
                            <li class="breadcrumb-item"><a href="system.html">Системы</a></li>
                            <li class="breadcrumb-item active" ><a href="system-item.html">Кварцевый пол Elfloor</a></li>
                        </ol>
                    </nav>
                    <h4 data-aos="fade-up" data-aos-duration="1500">
                        КВАРЦЕВЫЙ ПОЛ ELFLOOR
                    </h4>
                    <p data-aos="fade-up" data-aos-duration="1500">
                        ELFLOOR - инновационная система декоративной отделки для стен и пола. Может применяться в помещениях с малой и средней интенсивностью нагрузки.
                    </p>
                </div>

            </div>
        </div>
    </div>
    <!-- main -->

    <!-- about -->
    <div class="about   servise-item system-item-about">
        <div class="container">

            <div class="about-content">
                <div class="about-left">
                    <h1 data-aos="fade-up" data-aos-duration="1500">ОБ ELFLOOR</h1>
                    <p data-aos="fade-up" data-aos-duration="1500">
                        ELFLOOR - инновационная система декоративной отделки для вертикальных и горизонтальных поверхностей на основе кварцевого песка и двухкомпонентного полиуретанового лака. Пол и стена единственным непрерывным покрытием. Выбирайте свой стиль и воплощайте любые дизайнерские фантазии и решение!
                    </p>
                </div>
                <div class="about-right">
                    <div class="about-img ">
                        <img src="../images/system-item-img-1.png" alt="">
                    </div>
                </div>
            </div>

            <div class="about-content about-page-content-2">
                <div class="about-right">
                    <div class="about-img">
                        <img src="../images/system-item-img-2.png" alt="">
                    </div>
                </div>
                <div class="about-left">
                    <h1 data-aos="fade-up" data-aos-duration="1500">СУТЬ СИСТЕМЫ</h1>
                    <p data-aos="fade-up" data-aos-duration="1500">
                        Поэтапное нанесение продуктов ELF DECOR™:
                    <ul data-aos="fade-up" data-aos-duration="1500">
                        <li>
                            декоративные покрытия на основе кварцевого песка ELFLOOR BASE и ELFLOOR FINISH - готовые к применение пасты, которые удобно тонировать в любой цвет и легко наносить;
                        </li>
                        <li>
                            двухкомпонентный полиуретановый лак VARNISH PROTECT 2K - ультрапрочное покрытие, которое есть в глянцевой и матовой версии на ваш выбор;
                        </li>
                        <li>
                            специальный отвердитель ELFLOOR HARDENER - применяется как второй компонент для достижения высоких прочностных характеристик всех продуктов
                        </li>
                    </ul>
                    </p>
                </div>
            </div>

            <div class="about-content about-page-content-3 system-page-content-3">
                <div class="about-left">
                    <h1 data-aos="fade-up" data-aos-duration="1500">ПРЕИМУЩЕСТВА ПОКРЫТИЯ</h1>
                    <p data-aos="fade-up" data-aos-duration="1500">
                        Материал обладает особой реологией, которая позволяет с легкостью наносить его как на горизонтальные, так и на вертикальные основания. В качестве основания может выступать цементная стяжка, нивелирмасса, мраморная крошка, бетон, керамическая плитка. В случае декорирования мебели или столешниц, основание должно быть цельным прочно собранным и не иметь подвижных трещин или щелей.
                    </p>
                </div>
                <div class="about-right">
                    <div class="about-img ">
                        <img src="../images/system-item-img-3.png" alt="">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- about -->

    <!-- pages About -->
    <div class="pagesAbout addPadding systemItemAbout">
        <div class="container">

            <h2 data-aos="fade-up" data-aos-duration="1500">Товары системы Кварцевый пол ELFLOOR</h2>


            <!-- section card -->
            <div class="section-card">
                <div class="container">
                    <form action="" onchange="filter()">
                        <div class="filter-row">
                            <div class="filter-item">
                                <p>ФИЛЬТРЫ:</p>
                            </div>
                            <div class="filter-item">
                                <p>ПРИМЕНЕНИЕ</p>
                                <select name="" id="ilova">
                                    <option value="none">ВЫБРАТЬ</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="filter-item">
                                <p>ПРЕИМУЩЕСТВА</p>
                                <select name="" id="murojat">
                                    <option value="none">ВЫБРАТЬ</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="filter-item">
                                <p>СОСТАВ</p>
                                <select name="" id="sostav">
                                    <option value="none">ВЫБРАТЬ</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="filter-item">
                                <p>ЭФФЕКТ</p>
                                <select name="" id="effect">
                                    <option value="none">ВЫБРАТЬ</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="filter-item">
                                <p>НАЗНАЧЕНИЕ</p>
                                <select name="" id="maqsad">
                                    <option value="none">ВЫБРАТЬ</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- section card -->

            <div class="card-item-Page text-3d">
                <div class="card-foot d-flex  flex-wrap gap-4">


                    <div class="card-foot-item" data-id="1">
                        <div class="card-img text-center">
                            <img src="../images/3d-1.png" class="img-fluid" alt="">
                            <div class="card-foot-item-shape pulse">
                                <a href="#" download><span>&#10230;</span></a>
                            </div>
                        </div>
                        <h5>ARTSTONE E101</h5>
                        <p>
                            <a href="#" download>File ZIP (49.85 МB)</a>
                        </p>


                    </div>



                    <div class="card-foot-item" data-id="2" >
                        <div class="card-img text-center">
                            <img src="../images/3d-2.png" class="img-fluid" alt="">
                            <div class="card-foot-item-shape pulse">
                                <a href="#" download><span>&#10230;</span></a>
                            </div>
                        </div>
                        <h5>Encanto</h5>
                        <p>
                            <a href="#" download>File ZIP (49.85 МB)</a>
                        </p>
                    </div>



                    <div class="card-foot-item" data-id="3">
                        <div class="card-img text-center">
                            <img src="../images/3d-3.png" class="img-fluid" alt="">
                            <div class="card-foot-item-shape pulse">
                                <a href="#" download><span>&#10230;</span></a>
                            </div>
                        </div>
                        <h5>JOKER</h5>
                        <p>
                            <a href="#" download>File ZIP (49.85 МB)</a>
                        </p>
                    </div>



                    <div class="card-foot-item" data-id="1">
                        <div class="card-img text-center ">
                            <img src="../images/3d-4.png" class="img-fluid" alt="">
                            <div class="card-foot-item-shape pulse">
                                <a href="#" download><span>&#10230;</span></a>
                            </div>
                        </div>
                        <h5>POWER 7</h5>
                        <p>
                            <a href="#" download>File ZIP (49.85 МB)</a>
                        </p>
                    </div>

                    <div class="card-foot-item" data-id="2">
                        <div class="card-img text-center">
                            <img src="../images/3d-4.png" class="img-fluid" alt="">
                            <div class="card-foot-item-shape pulse">
                                <a href="#" download><span>&#10230;</span></a>
                            </div>
                        </div>
                        <h5>POWER 7</h5>
                        <p>
                            <a href="#" download>File ZIP (49.85 МB)</a>
                        </p>
                    </div>

                </div>
            </div>



            <h2 class="display-none" data-aos="fade-up" data-aos-duration="1500">Галерея материалов и работ</h2>

            <!-- swipper -->
            <div class="system-swiper-content">
                <div class="swiper-container mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="../images/main.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="../images/main-video-bg.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="../images/forProduct.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="../images/about-right.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="swiper-button-next pulse"></div>
                    <div class="swiper-button-prev pulse"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <!-- swipper -->



            <!-- pages About -->
            <div class="pagesAbout addPadding systemItemAbout">


                <h3 data-aos="fade-up" data-aos-duration="1500">КВАРЦЕВЫЙ ПОЛ</h3>

                <p data-aos="fade-up" data-aos-duration="1500">
                    Наливные полы имеют привлекательный вид и изрядно потеснили классическую напольную плитку со швами. Современные кварцевые полы производят из кварцевого агломерата, полиуретановой или эпоксидной смолы. Компоненты дают прочную связку, что делает кварцевый пол оптимальным решением для общественных мест.
                </p>

                <p data-aos="fade-up" data-aos-duration="1500">
                    Смеси наливного пола бывают однокомпонентными и двухкомпонентными в зависимости от состава.
                </p>

                <p data-aos="fade-up" data-aos-duration="1500">
                    Однокомпонентные составы заливаются тонким слоем - до 1 мм. Они полностью готовы к работе: смесь необходимо перемешать и залить.
                </p>
                <p data-aos="fade-up" data-aos-duration="1500">
                    Двухкомпонентные составы обладают стойкостью к ударам и большим нагрузкам.
                </p>

                <p data-aos="fade-up" data-aos-duration="1500">Преимущества кварцевого пола:</p>
                <p data-aos="fade-up" data-aos-duration="1500">
                    У нас Вы можете подобрать и купить товар в категории Кварцевый пол по выгодным ценам с доставкой у дилеров в городе Киев, Харьков, Одесса, Днепр (Днепропетровск), Львов, Запорожье, Кривой Рог, Николаев, Винница, Херсон, Чернигов, Полтава, Черкассы, Хмельницкий, Сумы и по всей Украине!
                </p>


            </div>
            <!-- pages About -->

        </div>
    </div>
    <!-- pages About -->

@endsection
