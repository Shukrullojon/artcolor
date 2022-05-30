<!-- footer -->
<div class="footer">
    <div class="container">
        @php
            $contact = \App\Models\Contact::latest()->first();
            $lang = strtolower(App::getLocale('locale'));
            if(strlen($lang)>2){
                $lang=substr($lang,0,2);
            }
        @endphp
        <div class="footer-content d-flex justify-content-center text-center text-sm-start   justify-content-sm-between">
            <div class="footer-item" data-aos="fade-up" data-aos-duration="1500">
                <a href="{{ url("/") }}">
                    @if(!empty($contact->logo))
                        <img src="{{ asset('uploads/'.$contact->logo)}}" alt="">
                    @endif
                </a>
                <p>
                    @if(!empty($contact))
                        @if($lang == "uz") {{ $contact->title_uz }} @elseif($lang == "ru") {{ $contact->title_ru }} @else {{ $contact->title_en }} @endif
                    @endif
                </p>
                <h6 class="mb-3">@lang('front.text.follow_us')</h6>
                <div class="main-social-app">
                    <a href="@if(!empty($contact->telegram)){{ $contact->telegram }} @endif">
                        <i class="fab fa-telegram"></i>
                    </a>
                    <a href="{{ $contact->youtube ?? "" }}">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="{{ $contact->facebook ?? "" }}">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="{{ $contact->instagram ?? "" }}">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
            <div class="footer-item" data-aos="fade-up" data-aos-duration="1500">
                <a href="{{ url("/") }}">@lang('front.sidebar.home')</a>
                <a href="{{ route("product") }}">@lang('front.sidebar.product')</a>
                <a href="{{ route("about") }}">@lang('front.sidebar.about_company')</a>
                <a href="{{ route("blog") }}">@lang('front.sidebar.news')</a>
                <a href="{{ route("service") }}">@lang('front.sidebar.service')</a>
                <a href="{{ route("download") }}">@lang('front.sidebar.Downloads')</a>
                <a href="{{ route("contact") }}">@lang('front.sidebar.contact')</a>
            </div>
            <div class="footer-item" data-aos="fade-up" data-aos-duration="1500">
                <h6>@lang('front.text.Address'):</h6>
                @php
                    $lang = strtolower(App::getLocale('locale'));
                    if(strlen($lang)>2){
                        $lang=substr($lang,0,2);
                    }
                @endphp
                @if(!empty($contact->addresses))
                    @foreach($contact->addresses as $add)
                        <div class="address">
                            <div>
                                <img src="{{ asset('artColor/images/location.png') }}" alt="">
                            </div>
                            <div>
                                <p>
                                    @if($lang == "uz") {{ $add->address_uz }} @elseif($lang == "ru") {{ $add->address_ru }} @else {{ $add->address_en }} @endif
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>

            <div class="footer-item" data-aos="fade-up" data-aos-duration="1500">
                <h6>@lang('front.sidebar.contact'):</h6>
                <div class="address">
                    <div>
                        <i class="fas fa-solid fa-phone"></i>
                    </div>
                    <div>
                        <p>
                            <a href="tel:{{ $contact->phone_1 ?? "" }}">{{ $contact->phone_1 ?? "" }}</a>
                        </p>
                    </div>
                </div>
                <div class="address">
                    <div>
                        <i class="fas fa-solid fa-envelope"></i>
                    </div>
                    <div>
                        <p>
                            <a href="mailto:{{ $contact->email ?? "" }}">{{ $contact->email ?? "" }}</a>
                        </p>
                    </div>
                </div>
                <h6 class="my-3">@lang('front.text.Schedule'):</h6>
                <div class="address">
                    <div>
                        <i class="fas fa-solid fa-clock"></i>
                    </div>
                    <div>
                        <p>
                            {{ $contact->timetable ?? ""}}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="footer-ads">
        <div class="container">
            <div class="footer-ads-content d-flex justify-content-between align-items-center">
                <div class="footer-left">
                    <p>При перепечатке любых материалов ссылка на веб-сайт обязательна</p>
                </div>
                <div class="footer-right">
                    <p>2022. Все права защищены. </p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- footer -->
