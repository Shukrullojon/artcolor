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
                            <li class="breadcrumb-item"><a href="{{ route("download") }}">@lang('front.sidebar.Downloads')</a></li>
                            <li class="breadcrumb-item active" ><a href="">{{ $header->title }}</a></li>
                        </ol>
                    </nav>
                    <h4 data-aos="fade-up" data-aos-duration="1500">
                        {{ $header->title }}
                    </h4>

                </div>
            </div>
        </div>
        <!-- main -->
    @endif

    <!-- section card -->
    <div class="section-card text-3d">
        <div class="container">
            <form action="" onchange="filter()">
                <div class="filter-row">
                    <div class="filter-item">
                        <p>@lang('front.text.FILTERS'):</p>
                    </div>
                    <div class="filter-item" >
                        <p>@lang('admin.crud.effect')</p>
                        <select name=""  id="effect">
                            <option value="none">@lang('front.text.CHOOSE')</option>
                            @foreach($filter_1 as $filter)
                                <option value="{{ $filter->id }}">{{ $filter->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="filter-item" >
                        <p>@lang('admin.crud.product')</p>
                        <select name=""  id="product">
                            <option value="none">@lang('front.text.CHOOSE')</option>
                            @foreach($filter_2 as $filter)
                                <option value="{{ $filter->id }}">{{ $filter->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- section card -->

    <!-- card- item -->
    <div class="text-3d-bg">
        <div class="container card-item-Page text-3d">
            <div class="card-foot d-flex  align-items-center flex-wrap gap-4">
                @foreach($products  as $product)
                    <div class="card-foot-item" data-id="1">
                        <div class="card-img text-center">
                            <img src="{{ asset("uploads/".$product->image) }}" class="img-fluid" alt="">
                            <div class="card-foot-item-shape pulse">
                                <a href="{{ route("downloaditemdownload",$product->id) }}"><span>&#10230;</span></a>
                            </div>
                        </div>
                        <h5>{{ $product->title }}</h5>
                        <p>
                            <a href="{{ route("downloaditemdownload",$product->id) }}">{{ $product->origin }} ({{ number_format($product->mb/1024,2,'.','') }} МB)</a>
                        </p>
                    </div>
                @endforeach


                {{ $products->links() }}
            </div>
        </div>
    </div>
    <!-- card- item -->


    @if(!empty($footer))
        <!-- pages About -->
        <div class="pagesAbout addPadding">
            <div class="container">
                <h2 data-aos="fade-up" data-aos-duration="1500">{{ $footer->title }}</h2>
                <p data-aos="fade-up" data-aos-duration="1500">
                    {{ $footer->info }}
                </p>

            </div>
        </div>
        <!-- pages About -->
    @endif
@endsection

@section('scripts')
    <script src="{{ asset("artColor/js/popper.min.js") }}"></script>
    <script src="{{ asset("artColor/js/bootstrap.min.js")}}></script>
    <script>
        // scrool
        let mybutton = document.getElementById("btn-back-to-top");
        window.onscroll=function(){
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
        // filter
        function filter(){
            alert("1234");
            let effect = document.querySelector('#effect');
            let product = document.querySelector('#product');


            if(effect , product){

                let cardItem = document.querySelectorAll('.card-foot-item');

                cardItem.forEach(element => {
                    let cardId  = element.getAttribute('data-id');



                    if(!(cardId == effect.value)){
                        element.style.display = 'none'
                    }
                    if(!(cardId == product.value)){
                        element.style.display = 'none'
                    }

                    if(cardId == product.value){
                        element.style.display = 'block'
                    }
                    if(cardId == effect.value){
                        element.style.display = 'block'
                    }

                    // if(effect.value == 'none' || product.value == 'none'){
                    //     element.style.display = 'block'
                    // }

                });
            }
        }













    </script>
@endsection
