@extends('layouts.app')

@section('content')
    <!-- main -->
    <div class="mainPage" style="background-image: url(../images/system-bg.png);">
        <div class="mainPage-bg">
            <div class="container">

                <div class="mainPage-content">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index.html">Главная</a></li>
                            <li class="breadcrumb-item active" ><a href="system.html">Системы</a></li>
                        </ol>
                    </nav>
                    <h4 data-aos="fade-up" data-aos-duration="1500">
                        СИСТЕМЫ
                    </h4>
                </div>

            </div>
        </div>
    </div>
    <!-- main -->


    <!-- section 1 -->
    <div class="section-1 kraska downloadmaterial system">
        <div class="container">

            <div class="section-item-left">
                <h4>
                    Категории систем
                </h4>
            </div>

            <div class="section-1-content">


                <div class="section-item">

                    <a href="system-item.html">
                        <div class="section-1-item">

                            <div class="section-1-img">
                                <img src="../images/system-item-1.png" class="section-1-item-img" alt="">


                                <div class="section-1-about">
                                    <h3>
                                        THERMOELF
                                    </h3>
                                    <p>
                                        Современная система утепления фасадов для любых домов и зданий.
                                    </p>
                                </div>

                                <div class="section-1-link">
                                    <a href="system-item.html">
                                        <span>Подробнее</span>
                                        <img src="../images/right-vector.png" alt="">
                                    </a>
                                </div>


                            </div>



                        </div>
                    </a>

                </div>

                <div class="section-item">
                    <a href="system-item.html">
                        <div class="section-1-item">

                            <div class="section-1-img">
                                <img src="../images/system-item-2.png" class="section-1-item-img" alt="">


                                <div class="section-1-about">
                                    <h3>
                                        SCAGLIOLA
                                    </h3>
                                    <p>
                                        Аутентичная система декоративной отделки, известная в Италии еще со времен
                                    </p>
                                </div>

                                <div class="section-1-link">
                                    <a href="system-item.html">
                                        <span>Подробнее</span>
                                        <img src="../images/right-vector.png" alt="">
                                    </a>
                                </div>


                            </div>



                        </div>
                    </a>
                </div>


                <div class="section-item transformSection">
                    <a href="system-item.html">
                        <div class="section-1-item">

                            <div class="section-1-img">
                                <img src="../images/system-item-3.png" class="section-1-item-img" alt="">


                                <div class="section-1-about">
                                    <h3>
                                        КВАРЦЕВЫЙ
                                        ПОЛ ELFLOOR
                                    </h3>
                                    <p>
                                        ELFLOOR - инновационная система декоративной отделки...
                                    </p>
                                </div>

                                <div class="section-1-link">
                                    <a href="system-item.html">
                                        <span>Подробнее</span>
                                        <img src="../images/right-vector.png" alt="">
                                    </a>
                                </div>


                            </div>



                        </div>
                    </a>
                </div>

            </div>

        </div>
    </div>
    <!-- section 1 -->

@endsection
