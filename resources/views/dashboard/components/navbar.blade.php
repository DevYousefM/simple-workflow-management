<style>
    @media only screen and (max-width: 575px) {

        .dark,
        .light {
            width: 90px;
            height: 90px;
            object-fit: contain;
        }
    }
</style>
<div class="mobile-search">
    <form action="/" class="search-form">
        <img src="{{ asset('dashboard/img/svg/search.svg') }}" alt="search" class="svg">
        <input class="form-control me-sm-2 box-shadow-none" type="search" placeholder="Search..." aria-label="Search">
    </form>
</div>
<div class="mobile-author-actions"></div>
<header class="header-top">
    <nav class="navbar navbar-light">
        <div class="navbar-left">
            <div class="logo-area">
                <a href="#" class="sidebar-toggle">
                    <img class="svg" src="{{ asset('dashboard/img/svg/align-center-alt.svg') }}" alt="img"></a>
            </div>
        </div>
        <div class="navbar-right">
            <ul class="navbar-right__menu">
                <li class="nav-flag-select">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle"><img src="{{ asset('dashboard/img/flag.png') }}"
                                alt="" class="rounded-circle"></a>
                        <div class="dropdown-parent-wrapper">
                            <div class="dropdown-wrapper dropdown-wrapper--small">

                            </div>
                        </div>

                    </div>
                </li>

                <li class="nav-author">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle"><img
                                src="{{ asset('dashboard/img/author-nav.jpg') }}" alt="" class="rounded-circle">
                            @if (Auth::guard('admin')->check())
                                <span class="nav-item__title">{{ Auth::guard('admin')->user()->name }}<i
                                        class="las la-angle-down nav-item__arrow"></i></span>
                            @endif
                        </a>
                        <div class="dropdown-parent-wrapper">
                            <div class="dropdown-wrapper">
                                <div class="nav-author__info">
                                    <div class="author-img">
                                        <img src="{{ asset('dashboard/img/author-nav.jpg') }}" alt=""
                                            class="rounded-circle">
                                    </div>
                                    <div>
                                        <h6>{{ Auth::guard('admin')->user()->name }}</h6>
                                    </div>
                                </div>
                                <div class="nav-author__options">
                                    <ul>
                                        <li id="ChangePassword">
                                            <a style="cursor: pointer">
                                                <img src="{{ asset('dashboard/img/svg/settings.svg') }}" alt="settings"
                                                    class="svg">change password</a>
                                        </li>
                                    </ul>
                                    <a href="{{ route('dashboard.logout') }}" class="nav-author__signout">
                                        <i class="uil uil-sign-out-alt"></i> sign out
                                    </a>
                                </div>
                            </div>
                            <!-- ends: .dropdown-wrapper -->
                        </div>
                    </div>
                </li>
                <!-- ends: .nav-author -->
            </ul>
        </div>
    </nav>
</header>
