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
                            <li class="breadcrumb-item"><a href="{{ route("gallery") }}">@lang('front.sidebar.gallery')</a></li>
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

    <div class="gallery-item-bg">
        @if(!empty($filters))
            <!-- section card -->
            <div class="section-card text-3d gallery-item-bg-1">
                <div class="container">
                    <form action="" onchange="filter()">
                        <div class="filter-row">
                            <div class="filter-item">
                                <p>@lang('front.text.FILTERS'):</p>
                            </div>
                            @foreach($filters as $filter)
                                <div class="filter-item">
                                    <p>{{ $filter->title }}</p>
                                    <select name="" id="qoplash">
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

        @if(count($items))
            <!-- card- item -->
            <div class="">
                <div class="container card-item-Page text-3d">
                    <div class="card-foot d-flex  flex-wrap gap-4" id="gallery--getting-started">
                        @foreach($items as $item)
                            <div class="card-foot-item" data-id="{{ $item->filter_id }}">
                                <div class="card-img text-center">
                                    <a href="{{ asset("uploads/".$item->image) }}" data-pswp-width="1500" data-pswp-height="1000" target="_blank" class="a-link">
                                        <img src="{{ asset("uploads/".$item->image) }}" class="img-fluid" alt="">
                                    </a>
                                    <div class="card-foot-item-shape pulse">
                                        <a href="{{ asset("uploads/".$item->image) }}" data-pswp-width="1500" data-pswp-height="1000" target="_blank" class="a-link"><span>&#43;</span></a>
                                    </div>
                                </div>
                                <h5>{{ $item->title }}</h5>
                                <p>
                                    <a href="{{ asset("uploads/".$item->image) }}">ПОСМОТРЕТЬ<span>&#10230;</span>
                                    </a>
                                </p>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <!-- card- item -->
        @endif
    </div>


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
            let qoplash = document.querySelector('#qoplash');
            let taqlid = document.querySelector('#taqlid');
            let korinish = document.querySelector('#KORINISH');
            if(qoplash , taqlid , korinish){
                let cardItem = document.querySelectorAll('.card-foot-item');
                console.log(cardItem)
                cardItem.forEach(element => {
                    let cardId  = element.getAttribute('data-id');

                    if(!(cardId == qoplash.value)){
                        element.style.display = 'none'
                    }
                    if(!(cardId == taqlid.value)){
                        element.style.display = 'none'
                    }
                    if(!(cardId == korinish.value)){
                        element.style.display = 'none'
                    }
                    if(cardId == taqlid.value){
                        element.style.display = 'block'
                    }
                    if(cardId == qoplash.value){
                        element.style.display = 'block'
                    }
                    if(cardId == korinish.value){
                        element.style.display = 'block'
                    }

                });
            }
        }
    </script>
    <!-- my js code -->

    <script type="module">
        // Include Lightbox
        import PhotoSwipeLightbox from '{{ asset("artcolor/js/photoswipe-lightbox.esm.min.js") }}';

        const lightbox = new PhotoSwipeLightbox({
            // may select multiple "galleries"
            gallery: '#gallery--getting-started',

            // Elements within gallery (slides)
            children: '.a-link',

            // setup PhotoSwipe Core dynamic import
            pswpModule: () => import('{{ asset("artcolor/js/photoswipe.esm.min.js")}}')
        });
        lightbox.init();
    </script>

@endsection
