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

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.product')</p>
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
                        <a href="{{route('about.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Abouts </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('item.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>About Item</p>
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
                            <p>Activity </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('videos.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Videos </p>
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
                        <a href="{{route('categories.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Category new </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('news.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>News </p>
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


                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-address-book"></i>
                    <p>
                        @lang('admin.sidebar.contact')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.contact')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.header_text')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.contact_type')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.country')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>@lang('admin.sidebar.footer_text')</p>
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
