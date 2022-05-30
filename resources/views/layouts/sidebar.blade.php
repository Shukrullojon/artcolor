<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        @lang('admin.sidebar.home')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route("slider.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.slider')</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("works.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.work')</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("work_items.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.work_item')</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-chart-bar"></i>
                    <p>
                        @lang('admin.sidebar.product')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route("category.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.category')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("categorytext.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.category_text')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("subcategory.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.sub_category')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("subcategoryheader.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.sub_category_header')</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-chart-bar"></i>
                    <p>
                        @lang('admin.sidebar.product_type')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route("producttype.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.product_type')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("producttypeitem.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.product_type_item')</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-chart-bar"></i>
                    <p>
                        @lang('admin.sidebar.product_main')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route("product.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.product')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("productfilter.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.product_filter')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('card_headers.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.card_header')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('card_abouts.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.card_about')</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-info"></i>
                    <p>
                        @lang('admin.sidebar.about_company')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('about_abouts.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            @lang('admin.sidebar.about_about')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('about.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            @lang('admin.sidebar.about')
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('item.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            @lang('admin.sidebar.about_item')
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('text.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.about_text')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('activity.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            @lang('admin.sidebar.activity')
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('videos.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            @lang('admin.sidebar.video')
                        </a>
                    </li>


                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-newspaper"></i>
                    <p>
                        @lang('admin.sidebar.news')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('categorynew.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.category')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('news.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.news')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('newheader.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.new_header')</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-download"></i>
                    <p>
                        @lang('admin.sidebar.download')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route("download-header.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.download_header')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("downloadabout.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.download_about')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("downloadinfo.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.download_info')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("downloadcategory.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.download_category')</p>
                        </a>
                    </li>


                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-download"></i>
                    <p>
                        @lang('admin.sidebar.download_item')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route("downloaditemfilter.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.download_item_filter')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("downloaditemfooter.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.download_item_footer')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("downloaditemheader.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.download_item_header')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("downloaditemproduct.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.download_item_product')</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{route('contacts.index')}}" class="nav-link">
                    <i class="nav-icon fa fa-address-book"></i>
                    <p>
                        @lang('admin.sidebar.contact')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('contacts.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.contact')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('contact_headers.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.header_text')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('contact_types.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.contact_type')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('countries.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.country')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('contact_footers.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.footer_text')</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="nav-icon fa fa-wrench"></i>
                    <p>
                        @lang('admin.sidebar.service')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('service_texts.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            @lang('admin.sidebar.service_text')
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('services.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            @lang('admin.sidebar.service')
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('service_headers.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            @lang('admin.sidebar.service_header')
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('service_items.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            @lang('admin.sidebar.service_item')
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('service_images.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            @lang('admin.sidebar.service_image')
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="nav-icon fa fa-image"></i>
                    <p>
                        @lang('admin.sidebar.galery')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route("galleryheader.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.gallery_header')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("gallerycategory.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.gallery_category')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("galleryabout.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.gallery_about')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("galleryitemheader.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.gallery_item_header')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("galleryfilter.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.gallery_filter')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("galleryitem.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.gallery_item')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("galleryitemfooter.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.gallery_item_footer')</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="nav-icon fa fa-video"></i>
                    <p>
                        @lang('admin.sidebar.galery_video')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route("galleryvideoheader.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.gallery_video_header')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("galleryvideofilter.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.gallery_video_filter')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("galleryvideo.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.gallery_video')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("galleryvideofooter.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.gallery_video_footer')</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="nav-icon fa fa-briefcase"></i>
                    <p>
                        @lang('admin.sidebar.portfolio')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route("portfolioheader.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.portfolio_header')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("portfolioabout.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.portfolio_about')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("portfolioimage.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.portfolio_image')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("portfoliocharacter.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.portfolio_character')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("portfolioproduct.index") }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.portfolio_product')</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="nav-icon fa fa-assistive-listening-systems"></i>
                    <p>
                        @lang('admin.sidebar.system')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('system_headers.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            @lang('admin.sidebar.system_header')

                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('system_texts.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            @lang('admin.sidebar.system_text')
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('systems.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            @lang('admin.sidebar.system')
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('system_item_headers.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            @lang('admin.sidebar.system_item_header')
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('system_items.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            @lang('admin.sidebar.system_item')
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('system_filters.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            @lang('admin.sidebar.system_filter')
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            @lang('admin.sidebar.system_product')
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('system_sliders.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            @lang('admin.sidebar.system_slider')
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('system_abouts.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            @lang('admin.sidebar.system_about')
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link ">
                    <i class="fa fa-language"></i>
                    <p> @lang('admin.sidebar.language')</p>
                    <i class="fas fa-angle-left right"></i>
                </a>
                <ul class="nav nav-treeview pl-2" style="display: {{ Request::is('replenishment*') ? 'block':'none'}};">
                    <li class="nav-item">
                        <a href="/language/uz" class="nav-link">
                            <i class="fa">UZ</i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/language/ru" class="nav-link">
                            <i class="fa">RU</i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/language/en" class="nav-link">
                            <i class="fa">EN</i>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link"
                   onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        @lang('admin.sidebar.logout')
                    </p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>


    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
