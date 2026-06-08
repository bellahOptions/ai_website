{{-- ==== header start ==== --}}
<header class="header">
    <div class="primary-navbar secondary--navbar">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar p-0">
                        <div class="navbar__logo">
                            <a href="{{ route('home.page') }}" aria-label="go to home">
                                <img src="{{ asset('logo-wt.svg') }}" alt="AI Digital Agency" style="height:38px;width:auto;filter:brightness(0) invert(1);" class="d-none d-dark-block">
                                <img src="{{ asset('logo.svg') }}" alt="AI Digital Agency" style="height:38px;width:auto;">
                            </a>
                        </div>
                        <div class="navbar__options">
                            <button class="open-offcanvas-nav d-flex" aria-label="toggle mobile menu" title="open menu"></button>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
{{-- ==== / header end ==== --}}

{{-- ==== offcanvas nav start ==== --}}
<div class="offcanvas-nav">
    <div class="offcanvas-menu">
        <nav class="offcanvas-menu__wrapper">
            <div class="offcanvas-menu__header nav-fade">
                <div class="logo">
                    <a href="{{ route('home.page') }}">
                        <img src="{{ asset('logo.svg') }}" alt="AI Digital Agency" style="height:38px;width:auto;">
                    </a>
                </div>
                <a href="javascript:void(0)" aria-label="close offcanvas menu" class="close-offcanvas-menu">
                    <i class="fa-light fa-xmark-large"></i>
                </a>
            </div>

            <div class="offcanvas-menu__list">
                <div class="navbar__menu">
                    <ul>
                        <li class="navbar__item nav-fade {{ request()->routeIs('home.page') ? 'active' : '' }}">
                            <a href="{{ route('home.page') }}">Home</a>
                        </li>
                        <li class="navbar__item nav-fade {{ request()->routeIs('about.page') ? 'active' : '' }}">
                            <a href="{{ route('about.page') }}">About Us</a>
                        </li>
                        <li class="navbar__item nav-fade {{ request()->routeIs('services.page') ? 'active' : '' }}">
                            <a href="{{ route('services.page') }}">Services</a>
                        </li>
                        <li class="navbar__item nav-fade {{ request()->routeIs('blog.*') ? 'active' : '' }}">
                            <a href="{{ route('blog.list') }}">Blog</a>
                        </li>
                        <li class="navbar__item nav-fade {{ request()->routeIs('contact.page') ? 'active' : '' }}">
                            <a href="{{ route('contact.page') }}">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="offcanvas-menu__options nav-fade">
                <div class="offcanvas__mobile-options d-flex">
                    <a href="{{ route('contact.page') }}" class="btn btn--secondary">Let's Talk</a>
                </div>
            </div>

            <div class="offcanvas-menu__social social nav-fade">
                <a href="#" target="_blank" aria-label="facebook"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" target="_blank" aria-label="twitter"><i class="fa-brands fa-twitter"></i></a>
                <a href="#" target="_blank" aria-label="instagram"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" target="_blank" aria-label="linkedin"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
        </nav>
    </div>
</div>
{{-- ==== / offcanvas nav end ==== --}}
