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
                <li class="nav-notification">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle icon-active">
                            <img class="svg" src="{{ asset('dashboard/img/svg/alarm.svg') }}" alt="img">
                        </a>
                        <div class="dropdown-parent-wrapper">
                            <div class="dropdown-wrapper">
                                <h2 class="dropdown-wrapper__title">Notifications <span
                                        class="badge-circle badge-warning ms-1">{{ auth()->user()->unreadNotifications->count() }}</span>
                                </h2>
                                <ul>
                                    @foreach (auth()->user()->unreadNotifications as $i)
                                        <li class="nav-notification__single nav-notification__single d-flex flex-wrap">
                                            <div class="nav-notification__details">
                                                <p>
                                                    <span>{{ $i->data['message'] }}</span>
                                                </p>
                                                <p>
                                                    <span
                                                        class="time-posted">{{ $i->created_at->diffForHumans() }}</span>
                                                </p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <a href="" class="dropdown-wrapper__more">See all incoming activity</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-author">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle"><img
                                src="{{ asset('dashboard/img/author-nav.jpg') }}" alt="" class="rounded-circle">
                            @if (Auth::check())
                                <span class="nav-item__title">{{ Auth::user()->name }}<i
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
                                        <h6>{{ Auth::user()->name }}</h6>
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
                                    <a href="{{ route('user.logout') }}" class="nav-author__signout">
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
