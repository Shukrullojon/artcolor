@extends('layouts.app')

@section('content')
    @if(!empty($header))
        <!-- main -->
        <div class="mainPage" style="background-image: url('{{ asset('uploads/'.$header->image) }}');">
            <div class="mainPage-bg">
                <div class="container">
                    <div class="mainPage-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route("index") }}">@lang('front.sidebar.home')</a></li>
                                <li class="breadcrumb-item active" ><a href="">{{ $subcategory->title }}</a></li>
                            </ol>
                        </nav>
                        <h4 data-aos="fade-up" data-aos-duration="1500">
                            {{ $header->title }}
                        </h4>
                        <p data-aos="fade-up" data-aos-duration="1500">
                            {{ $header->info }}
                        </p>
                    </div>

                </div>
            </div>
        </div>
        <!-- main -->
    @endif

    @if(count($filters)>0)
        <!-- section card -->
        <div class="section-card">
            <div class="container">
                <form action="" onchange="filter()">
                    <div class="filter-row">
                        <div class="filter-item" data-aos="fade-up" data-aos-duration="1500">
                            <p>@lang('front.text.FILTERS'):</p>
                        </div>
                        @foreach($filters as $filter)
                            <div class="filter-item" data-aos="fade-up" data-aos-duration="1500">
                                <p>{{ $filter->title }}</p>
                                <select name="" id="ilova">
                                    <option value="none">@lang('front.text.CHOOSE')</option>
                                    @foreach($filter->children as $child)
                                        <option value="{{ $child->id }}">{{ $child->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach

                    </div>
                </form>
            </div>
        </div>
        <!-- section card -->
    @endif


    @if(count($products)>0)
        <!-- card- item -->
        <div class="container card-item-Page">
            <div class="card-foot d-flex  flex-wrap gap-4">
                @foreach($products as $product)
                    <a href="{{ route("productitem",$product->id) }}" data-id="{{ $product->filter_id }}" class="card-item-filter">
                        <div class="card-foot-item" >
                            <div class="card-img text-center">
                                @if(!empty($product->image))
                                    <img src="{{ asset("uploads/".$product->image->image) }}" class="img-fluid" alt="">
                                @endif
                            </div>
                            <h5>{{ $product->title }}</h5>
                            <p>{{ $product->info }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <!-- card- item -->
    @endif


    @if(!empty($about))
        <!-- pages About -->
        <div class="pagesAbout">
            <div class="container">
                <h3 data-aos="fade-up" data-aos-duration="1500">{{ $about->title }}</h3>
                {!! $about->info !!}
            </div>
        </div>
        <!-- pages About -->
    @endif


@endsection

@section('scripts')
    <!-- my js code -->
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
        // filter
        function filter(){
            let ilove = document.querySelector('#ilova').value;
            let foydalar = document.querySelector('#foydalar').value;
            let murojat = document.querySelector('#murojat').value;
            let another = document.querySelector('#another').value;
            if(ilove , foydalar , murojat , another){
                let cardItem = document.querySelectorAll('.card-item-filter');
                cardItem.forEach(element => {
                    let cardId  = element.getAttribute('data-id');
                    if(!(cardId == ilove)){
                        element.style.display = 'none'
                    }
                    if(!(cardId == foydalar)){
                        element.style.display = 'none'
                    }
                    if(!(cardId == murojat)){
                        element.style.display = 'none'
                    }
                    if(!(cardId == another)){
                        element.style.display = 'none'
                    }
                    if(cardId == ilove){
                        element.style.display = 'block'
                    }
                    if(cardId == foydalar){
                        element.style.display = 'block'
                    }
                    if(cardId == murojat){
                        element.style.display = 'block'
                    }
                    if(cardId == another){
                        element.style.display = 'block'
                    }
                });
            }
        }
    </script>
    <!-- my js code -->
@endsection
