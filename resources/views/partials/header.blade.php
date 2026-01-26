<nav class="navbar sticky-lg-top navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container-fluid p-0 px-md-4 px-0">
        <a class="navbar-brand ms-md-0 ms-2" href="{{ route('home') }}">
            <img src="{{ asset('users-asset/images/logo/arabic-logo.png') }}" alt="logo"
                class="vidoo_logo img-fluid" height="50" width="100">
        </a>
        <button class="navbar-toggler me-2" type="button" onclick="toggleNav()" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse px-md-0 px-3" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('home') }}">الصفحة الرئيسية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('pricing') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('pricing') }}">الأسعار</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('creators') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('creators') }}">صُنّاع المحتوى</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle dropdown-home" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        خدماتنا
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 10L12 15L17 10" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('ecommerce') }}">التجارة الالكترونية</a></li>
                        <li><a class="dropdown-item" href="{{ route('agencies') }}">الوكالات</a></li>
                        <li><a class="dropdown-item" href="{{ route('brands') }}">العلامات التجارية</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('contact') }}">تواصل معنا</a>
                </li>
            </ul>
            <ul class="navbar-nav align-items-md-center align-items-start">
                <li class="nav-item">
                    <a href="{{ route('login.form') }}" class="nav-link login">
                        <span class="fw-bold">تسجيل الدخول</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a type="button" href="{{ route('login.form') }}" class="btn log-in-button my-md-0 my-2"
                        type="submit">
                        اطلب الان
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
