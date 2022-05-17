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
                <a href="{{ route('team.index') }}" class="nav-link {{ Request::is('team*') ? "active":'' }}">
                    <i class="nav-icon fa fa-users"></i>
                    <p>
                        @lang('admin.sidebar.our_team')
                    </p>
                </a>
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
