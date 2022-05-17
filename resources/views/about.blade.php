@extends('layouts.app')

@section('content')
    <!-- main -->
    <div class="mainPage" style="background-image: url(../images/main-video-bg.png);">
        <div class="mainPage-bg">
            <div class="container">

                <div class="mainPage-content">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index.html">Главная</a></li>
                            <li class="breadcrumb-item active" ><a href="about.html">О компании</a></li>
                        </ol>
                    </nav>
                    <h4 data-aos="fade-up" data-aos-duration="1500" >О компании</h4>
                </div>

            </div>
        </div>
    </div>
    <!-- main -->

    <!-- about -->
    <div class="about  my-3 ">
        <div class="container">
            <div class="about-content d-flex justify-content-between align-items-center">
                <div class="about-left">
                    <h1 data-aos="fade-up" data-aos-duration="1500" >Коротко о ARTCOLOR</h1>
                    <h5 class="py-4" data-aos="fade-up" data-aos-duration="2000" >Главная направляющая ELF DECOR - это качество нашей продукции.</h5>
                    <p data-aos="fade-up" data-aos-duration="2500" >
                        В ассортимент нашей торговой марки входят самые современные и изысканные материалы. Помимо продукции собственного производства, в коллекцию вошли продукты мировых лидеров в этой отрасли, которые на наш взгляд великолепно дополнили гамму ТМ «ЭльфDecor». Нами сформирована команда специалистов-декораторов.
                    </p>
                    <div class="about-result pt-4" >
                        <div class="about-result-content d-flex flex-wrap gap-4">
                            <div class="about-result-item" data-aos="fade-up" data-aos-duration="1500" >
                                <h1>1270</h1>
                                <p>Счастливые клиенты</p>
                            </div>
                            <div class="about-result-item"data-aos="fade-up" data-aos-duration="2000" >
                                <h1>68</h1>
                                <p>Типы красок</p>
                            </div>
                            <div class="about-result-item" data-aos="fade-up" data-aos-duration="2500" >
                                <h1>50</h1>
                                <p>
                                    Счастливые клиенты
                                </p>
                            </div>
                            <div class="about-result-item"data-aos="fade-up" data-aos-duration="3000" >
                                <h1>24</h1>
                                <p>Типы красок</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about-right" data-aos="fade-up"  data-aos-duration="1500">
                    <div class="about-img " >
                        <img src="{{ asset('artColor/images/about-right.png')}}" alt="">
                    </div>
                    <p class="pt-3">Создавая наши материалы мы ориентируемся не только на эстетику, но и на эксплуатационные характеристики. Прочность, долговечность и неизменность внешнего</p>
                </div>
            </div>
        </div>
    </div>
    <!-- about -->

    <!-- section team swipper -->
    <div class="about-page-swiper">
        <div class="container">

            <div class="about-page-content row">
                <div class="col-md-6 col-sm-4 col-12">
                    <h2 data-aos="fade-up" data-aos-duration="1500" >Руководство</h2>
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

                    <div class="swiper-slide">
                        <div class="swiper-slide-item">
                            <img src="{{ asset('artColor/images/person-1.png')}}" alt="">
                            <h5>Jo’rayev Abror</h5>
                            <p>CEO director</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-item">
                            <img src="{{ asset('artColor/images/person-2.png')}}" alt="">
                            <h5>Jo’rayev Abror</h5>
                            <p>CEO director</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-item">
                            <img src="{{ asset('artColor/images/person-3.png')}}" alt="">
                            <h5>Jo’rayev Abror</h5>
                            <p>CEO director</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-item">
                            <img src="{{ asset('artColor/images/person-4.png')}}" alt="">
                            <h5>Jo’rayev Abror</h5>
                            <p>CEO director</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-item">
                            <img src="{{ asset('artColor/images/person-5.png')}}" alt="">
                            <h5>Jo’rayev Abror</h5>
                            <p>CEO director</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-item">
                            <img src="{{ asset('artColor/images/person-5.png')}}" alt="">
                            <h5>Jo’rayev Abror</h5>
                            <p>CEO director</p>
                        </div>
                    </div>

                </div>




            </div>
        </div>

    </div>
    <!-- section team swipper -->

    <!-- about-about -->
    <div class="about-about">
        <div class="container">
            <div class="row">

                <div class="col-md-5 col-12">

                    <div class="about-about-img">
                        <img src="{{ asset('artColor/images/about-page-item-1.png') }}" alt="">

                        <div class="about-shape"></div>

                    </div>

                </div>

                <div class="col-md-6 offset-lg-1 col-12">
                    <h5 data-aos="fade-up" data-aos-duration="1500" >НАША НИША</h5>
                    <p data-aos="fade-up" data-aos-duration="2000" >
                        <b>За последние годы мы заняли свою нишу во всех сегментах рынка: начиная с профессиональных авторских интерьеров, заканчивая более бюджетными тендерными объектами и демократичными ремонтами.</b>
                    </p>
                    <p data-aos="fade-up" data-aos-duration="2500" >
                        Все материалы изготавливаются из самого лучшего, экологически чистого сырья Premium-класса. Основные компоненты декоративных покрытий импортируются на нашу производственную базу из Италии, Испании, Германии и Франции.
                    </p>
                </div>

            </div>
        </div>
    </div>
    <!-- about-about -->


    <!-- main video -->
    <div class="main-video d-flex justify-content-center align-items-center" style="background-image: url(../images/main-video-bg.png); ">
        <div class="video d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fas fa-solid fa-play" ></i>
        </div>
    </div>
    <!-- main video -->


    <!-- about-about-item 2 -->
    <div class="about-about about-about-item-2">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-12">
                    <p data-aos="fade-up" data-aos-duration="1500" >
                        <b>В ассортимент нашей торговой марки входят самые современные и изысканные материалы. Помимо продукции собственного производства, в коллекцию вошли продукты мировых лидеров в этой отрасли, которые на наш взгляд великолепно дополнили гамму ТМ «ЭльфDecor». Нами сформирована команда специалистов-декораторов.</b>
                    </p>
                    <p data-aos="fade-up" data-aos-duration="2000" >
                        В ассортимент нашей торговой марки входят самые современные и изысканные материалы. Помимо продукции собственного производства, в коллекцию вошли продукты мировых лидеров в этой отрасли, которые на наш взгляд великолепно дополнили гамму ТМ «ЭльфDecor». Нами сформирована команда специалистов-декораторов.
                    </p>
                </div>

                <div class="col-md-4  offset-lg-2 offset-md-1 col-12">

                    <div class="about-about-img">
                        <p data-aos="fade-up" data-aos-duration="2500" >
                            В ассортимент нашей торговой марки входят самые современные и изысканные материалы. Помимо продукции собственного производства, в коллекцию вошли продукты мировых лидеров в этой отрасли, которые на наш взгляд великолепно дополнили гамму ТМ «ЭльфDecor». Нами сформирована команда специалистов-декораторов.
                        </p>

                        <div class="about-shape"></div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- about-about-item 2 -->

@endsection

@section('scriptis')
        <script>
            // scrool
            let mybutton = document.getElementById("btn-back-to-top");
            window.onscroll = function () {
            scrollFunction();
        };

            function scrollFunction() {
            if (
            document.body.scrollTop > 20 ||
            document.documentElement.scrollTop > 20
            ) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
        }
            mybutton.addEventListener("click", backToTop);

            function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
            // progress bar
            const showOnPx = 100;
            const pageProgressBar = document.querySelector(".progress-bar");

            const scrollContainer = () => {
            return document.documentElement || document.body;
        };

            document.addEventListener("scroll", () => {

            const scrolledPercentage =
            (scrollContainer().scrollTop /
            (scrollContainer().scrollHeight - scrollContainer().clientHeight)) *
            100;

            pageProgressBar.style.width = `${scrolledPercentage}%`;


        });

            const validateEmail = (mail) => {
            return mail.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            );
        };

            let checkbox = document.getElementById('ok');
            if(checkbox){
            checkbox.addEventListener('click' , function(){
                if(checkbox.checked == true){
                    // input value
                    let name = document.getElementById('Имя').value ;
                    let tel = document.getElementById('tel').value ;
                    let mail = document.getElementById('mail').value ;

                    // input
                    let mailInput = document.getElementById('mail');
                    let telInput = document.getElementById('tel') ;
                    let nameInput = document.getElementById('Имя') ;

                    if(validateEmail(mail)){
                        mailInput.style.borderBottom = '2px solid green'
                    }else{
                        mailInput.style.borderBottom = '2px solid red'
                    }

                    if(name == ''){
                        nameInput.style.borderBottom = '2px solid red'
                    }else{
                        nameInput.style.borderBottom = '2px solid green'
                    }

                    if(tel == ""){
                        telInput.style.borderBottom = '2px solid red'
                    }else{
                        telInput.style.borderBottom = '2px solid green'
                    }



                }else{
                    console.log('checkbox isn\'t checked ')
                }
            })
        }


    </script>

@endsection
