<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Muhammadsolih">
    <title>ArtColor Контакты</title>

    <!-- aos animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- aos animation -->

    <!-- logo icon -->
    <link rel="icon" href="{{ asset("artColor/images/card-item-1.png") }}">
    <!-- logo icon -->


    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset("artColor/style/bootstrap.min.css")}}">
    <!-- bootstrap css -->

    <!-- my style code -->
    <link rel="stylesheet" href="{{ asset("artColor/style/style.css")}}">
    <link rel="stylesheet" href="{{ asset("artColor/style/media.css")}}">
    <!-- my style code -->
</head>
<body class="Navbar-Static blogPage">

<!-- progress bar -->
<div class="progress-bar"></div>
<!-- progress bar -->

<!-- btn -->
<button
    type="button"
    class="toTop pulse"
    id="btn-back-to-top"
>
    <i class="fas fa-arrow-up"></i>
</button>
<!-- btn -->

<!-- offcancas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel"></h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul>
            <li>
                <a href="{{ url("/") }}"  @if(Route::currentRouteName() == "index") class="active" @endif>@lang('front.sidebar.home')</a>
            </li>
            <li>
                <a href="{{ route("product") }}" @if(Route::currentRouteName() == "product") class="active" @endif>@lang('front.sidebar.product')</a>
            </li>
            <li>
                <a href="{{ route("about") }}" @if(Route::currentRouteName() == "about") class="active" @endif>@lang('front.sidebar.about_company')</a>
            </li>
            <li>
                <a href="{{ route("contact") }}" @if(Route::currentRouteName() == "contact") class="active" @endif>@lang('front.sidebar.contact')</a>
            </li>
        </ul>
        @php
            $contact = \App\Models\Contact::latest()->first();
        @endphp
        <div class="navbar-phone">
            <a href="tel:{{ $contact->phone_1 }}">
                <i class="fas fa-phone"></i>
                <span>{{ $contact->phone_1 }}</span>
            </a>
            <a href="tel:{{ $contact->phone_2 }}">
                <i class="fas fa-phone"></i>
                <span>{{ $contact->phone_2 }}</span>
            </a>
        </div>
        <div class="search">
            <div class="dropdown">
                @php $lang = session('locale') @endphp
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    @if(strlen($lang)>2) Ru @endif
                    @if($lang == "uz") Uz @endif
                    @if($lang == "ru") Ru @endif
                    @if($lang == "en") En @endif
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    @if($lang != "uz") <li><a class="dropdown-item" href="/language/uz">Uz</a></li> @endif
                    @if($lang != "ru" and strlen($lang) == 2) <li><a class="dropdown-item" href="/language/ru">Ru</a></li> @endif
                    @if($lang != "en") <li><a class="dropdown-item" href="/language/en">En</a></li> @endif
                </ul>
            </div>

        </div>
    </div>
</div>
<!-- offcancas -->

<!-- navbar -->
<div class="navMenu" >
    <div class="container">
        <div class="content">
            <div class="navbar-left">
                <a href="{{ route("index") }}">
                    <img src="{{ asset('uploads/'.$contact->logo)}}" alt="">
                </a>
                <ul>
                    <li>
                        <a href="{{ url("/") }}" @if(Route::currentRouteName() == "index") class="active" @endif>@lang('front.sidebar.home')</a>
                    </li>
                    <li>
                        <a href="{{ route("product") }}" @if(Route::currentRouteName() == "product") class="active" @endif>@lang('front.sidebar.product')</a>
                    </li>
                    <li>
                        <a href="{{ route("about") }}" @if(Route::currentRouteName() == "about") class="active" @endif>@lang('front.sidebar.about_company')</a>
                    </li>
                    <li>
                        <a href="{{ route("contact") }}" @if(Route::currentRouteName() == "contact") class="active" @endif>@lang('front.sidebar.contact')</a>
                    </li>
                </ul>
            </div>
            <div class="navbar-right">
                <div class="navbar-phone">
                    <a href="tel:{{ $contact->phone_1 }}">
                        <i class="fas fa-phone"></i>
                        <span>{{ $contact->phone_1 }}</span>
                    </a>
                    <a href="tel:{{ $contact->phone_2 }}">
                        <i class="fas fa-phone"></i>
                        <span>{{ $contact->phone_2 }}</span>
                    </a>
                </div>
                <div class="search">
                    <div class="dropdown">
                        @php $lang = session('locale') @endphp
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            @if(strlen($lang)>2) Ru @endif
                            @if($lang == "uz") Uz @endif
                            @if($lang == "ru") Ru @endif
                            @if($lang == "en") En @endif
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @if($lang != "uz") <li><a class="dropdown-item" href="/language/uz">Uz</a></li> @endif
                            @if($lang != "ru" and strlen($lang) == 2) <li><a class="dropdown-item" href="/language/ru">Ru</a></li> @endif
                            @if($lang != "en") <li><a class="dropdown-item" href="/language/en">En</a></li> @endif
                        </ul>
                    </div>

                </div>
            </div>
            <div class="navbar-bars">
                <div class="bars" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- navbar -->



<!-- main -->
<div class="main py-5">
    <div class="container">
        <div class="main-content">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route("index") }}">@lang('front.sidebar.home')</a></li>
                    <li class="breadcrumb-item active" ><a href="{{ route("contact") }}">@lang('front.sidebar.contact')</a></li>
                </ol>
            </nav>
            <h4 data-aos="fade-up" data-aos-duration="1500">
                {{ $header->title }}
            </h4>

            <div class="row align-items-center">
                <div class="col-md-8">
                    {{ $header->info }}
                </div>
                <div class="col-md-4">
                    <div class="about-us-btn">
                        <a href="{{ $header->button_link }}">
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


<!-- map contact -->
<div class="map-content">
    <div id="map" style="width: 100%;"></div>
    <div class="container">
        <div class="map-content-display">
            <div class="map-content-item">
                <div class="map-content-close-btn">
                    <i class="fa fa-close"></i>
                </div>
                <div class="map-content-about">
                    <img src="{{ asset("artColor/images/contact-img.png")}}" alt="">
                    <div class="map-text">
                        <p class="pb-3">Магазин «Маляр»</p>

                        <div>
                            <span>@lang('front.text.Address')</span>
                            @foreach($contact->addresses as $add)
                                <p>
                                    @if($lang == "uz") {{ $add->address_uz }} @elseif($lang == "ru") {{ $add->address_ru }} @else {{ $add->address_en }} @endif
                                </p>
                            @endforeach
                        </div>
                        <div>
                            <span>@lang('front.text.Schedule')</span>
                            <p>
                                {{ $contact->timetable }}
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
    </div>

    <div class="map-content-bg-display" id="btn-cl">
        <div class="map-content-bg">
            <div>
                <img src="{{ asset("artColor/images/map-icon.png")}}" alt="">
                <p><b>@lang('front.text.click_display_map')</b></p>
            </div>
        </div>
    </div>
</div>
<!-- map contact -->

<!-- map content form -->
<div class="map-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="map-form-item">
                    <div class="map-form-item-text">
                        <div>
                            <span>@lang('front.text.Address'):</span>
                            @foreach($contact->addresses as $add)
                                <p>
                                    <b>@if($lang == "uz") {{ $add->address_uz }} @elseif($lang == "ru") {{ $add->address_ru }} @else {{ $add->address_en }} @endif</b>
                                </p>
                                @php break; @endphp
                            @endforeach
                        </div>
                        <div>
                            <span>@lang('front.text.email'):</span>
                            <p><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
                        </div>
                        <div>
                            <span>@lang('front.text.Phone'):</span>
                            <p><a href="tel:{{ $contact->phone_1 }}">{{ $contact->phone_1 }}</a></p>
                        </div>
                    </div>

                    <div class="map-iframe">
                        <div id="map-2" style="width: 100%;"></div>

                        <div class="map-form-bg-display map-form-bg-display-2" id="btn-cl-1">
                            <div class="map-content-bg">
                                <div>
                                    <img src="{{ asset("artColor/images/map-icon.png")}}" alt="">
                                    <p><b>@lang('front.text.click_display_map')</b></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="map-form-item">

                    <div class="map-form-item-form">
                        <h4>@lang('front.text.discuss_your_project')?</h4>
                        <form action="" method="get">
                            <div class="d-flex flex-wrap">
                                <div class="form-item w-100">
                                    <!-- <input type="text" id="КОНТАКТА" autocomplete="off" required> -->
                                    <select name="contact" id="КОНТАКТА" onfocus="regionClose()">
                                        <option value="none"></option>
                                        @foreach($type as $t)
                                            <option value="{{ $t->title }}">{{ $t->title }}</option>
                                        @endforeach
                                    </select>
                                    <label for="КОНТАКТА">@lang('front.text.contact_type')*</label>
                                </div>

                                <div class="form-item">
                                    <input type="text" name="fio" id="имя" autocomplete="off" onfocus="regionClose()" required>
                                    <label for="имя">@lang('front.text.Name')*</label>
                                </div>

                                <div class="form-item">
                                    <select name="country" id="КОНТАКТА" onfocus="regionClose()">
                                        <option value="none"></option>
                                        @foreach($country as $c)
                                            <option value="{{ $c->title }}">{{ $c->title }}</option>
                                        @endforeach
                                    </select>
                                    <label for="Страна">@lang('front.text.Country')*</label>

                                </div>

                                <div class="form-item">
                                    <input type="email" name="email" id="mail" autocomplete="off" onfocus="regionClose()"  required>
                                    <label for="mail">@lang('front.text.email')</label>
                                </div>

                                <div class="form-item">
                                    <input type="number" name="number" id="tel" autocomplete="off "  onfocus="regionClose()"  required>
                                    <label for="tel">@lang('front.text.Phone')</label>
                                </div>

                                <div class="form-item w-100 xabar">
                                    <textarea name="message" id="Сообщение" cols="30" rows="10" autocomplete="off"  onfocus="regionClose()" required></textarea>
                                    <label for="Сообщение">@lang('front.text.Message')*</label>
                                </div>
                            </div>

                            <div class="d-flex gap-2  justify-content-md-center justify-content-sm-center justify-content-lg-start checkbox-map align-items-center">
                                <input type="checkbox" id="ok">
                                <label for="ok" class="ok-text">@lang('front.text.i_agre') <a href="#">@lang('front.text.terms_of_personal_data_processing')</a></label>
                            </div>

                            <div class="map-btn">
                                <button class="circleBtn">
                                    @lang('front.text.submit_an_application')
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="map-form-bg" style="background-image: url(../images/map-form-bg.png);"></div>
</div>
<!-- map content form -->


<!-- map about content -->
<!-- pages About -->
@if(!empty($footer))
    <div class="pagesAbout">
        <div class="container">
            <h3 data-aos="fade-up" data-aos-duration="1500">{{ $footer->title }}</h3>
            {{ $footer->info }}
        </div>
    </div>
@endif
<!-- pages About -->
<!-- map about content -->


<!-- footer -->
@include('layouts.front.footer')
<!-- footer -->

<!-- aos animation -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<!-- aos animation -->


<!-- font awesome -->
<script src="https://kit.fontawesome.com/02b94d3768.js" crossorigin="anonymous"></script>
<!-- font awesome -->

<!-- bootstrap js -->
<script src="{{ asset("artColor/js/popper.min.js")}}"></script>
<script src="{{ asset("artColor/js/bootstrap.min.js")}}"></script>
<!-- bootstrap js -->



<!-- my js -->
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

    // map content
    // let mapfirst = document.querySelector('.map-content-bg-display');

    // mapfirst.onclick = function(){
    //     mapfirst.style.display = 'none'
    // }


    // let mapClosebtn = document.querySelector('.map-content-close-btn');
    // let mapContent = document.querySelector('.map-content-display');

    // mapClosebtn.onclick = function(){
    //     mapContent.style.display = 'none'
    // }

    // let mapsecond = document.querySelector('.map-form-bg-display-2');
    // mapsecond.onclick = function(){
    //     mapsecond.style.display = 'none'
    // }

    // region content



    function regionChange(){
        console.log('test');
        let region = document.querySelector('.region');
        let regionItem = document.getElementsByClassName('search-item');
        let resultbtn = document.querySelector('#Страна')
        region.classList.add('active');



        Array.prototype.forEach.call(regionItem , element => {
            element.onclick = function(){
                resultbtn.value = element.innerText.trim();
                regionClose()
                console.log(element.innerHTML)
            }
        });


    }


    function regionClose(){
        console.log('test-1')
        let region = document.querySelector('.region');
        region.classList.remove('active')
    }

    function searchInputt(){
        let txtValue ;
        let input = document.getElementById('searchInput') ;
        let filter = input.value.toUpperCase();
        let ul = document.querySelector('.region-serach-result');
        let li = ul.getElementsByTagName('li')


        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }

    }



    // to check input
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
                let name = document.getElementById('имя').value ;
                let tel = document.getElementById('tel').value ;
                let mail = document.getElementById('mail').value ;
                let contact = document.getElementById('КОНТАКТА').value ;
                let region = document.getElementById('Страна').value ;
                let sms = document.getElementById('Сообщение').value ;

                // input
                let mailInput = document.getElementById('mail');
                let telInput = document.getElementById('tel') ;
                let nameInput = document.getElementById('имя') ;
                let contactInput = document.getElementById('КОНТАКТА');
                let regionInput = document.getElementById('Страна') ;
                let smsInput = document.getElementById('Сообщение');

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

                if(contact == "" || contact == 'none'){
                    contactInput.style.borderBottom = '2px solid red'
                }else{
                    contactInput.style.borderBottom = '2px solid green'
                }

                if(region == ""){
                    regionInput.style.borderBottom = '2px solid red'
                }else{
                    regionInput.style.borderBottom = '2px solid green'
                }

                if(sms == ""){
                    smsInput.style.borderBottom = '2px solid red'
                }else{
                    smsInput.style.borderBottom = '2px solid green'
                }



            }else{
                console.log('checkbox isn\'t checked ')
            }
        })
    }

</script>
<!-- my js -->
<!-- map -->
<script src="https://api-maps.yandex.ru/2.1/?apikey=92bd9a31-f25d-42dd-a08e-7de4b146adb1&lang=en_US" type="text/javascript"> </script>
<script src="{{ asset("artColor/js/map.js")}}"></script>
<!-- map -->

</body>
</html>
