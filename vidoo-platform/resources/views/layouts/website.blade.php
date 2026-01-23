<!DOCTYPE html>
<html class="loading" lang="ar" data-textdirection="rtl" dir="rtl" style="direction: rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    
    <link rel="apple-touch-icon" href="{{ asset('users-asset/images/logo/favicon.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('users-asset/images/logo/favicon.ico') }}">
    
    <link rel="stylesheet" href="{{ asset('website/lib/boostrap5.0.2/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/btns.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/home.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="{{ asset('website/lib/font/Messiri.css') }}" rel="stylesheet">
    <link href="{{ asset('users-asset/system/css/base.css') }}" rel="stylesheet">
    
    <title>@yield('title', 'فيدوو - السوق الرائد لإنتاج إعلانات الفيديو في العالم العربي')</title>
    
    @yield('styles')
</head>
<body class="horizontal-layout horizontal-menu footer-static">
    <nav class="navbar sticky-lg-top navbar-expand-lg navbar-light bg-white border-bottom">
        <div class="container-fluid p-0 px-md-4 px-0">
            <a class="navbar-brand ms-md-0 ms-2" href="{{ route('home') }}">
                <img src="{{ asset('users-asset/images/logo/arabic-logo.png') }}" alt="logo"
                    class="vidoo_logo img-fluid" height="50" width="100">
            </a>
            <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse px-md-0 px-3" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">الصفحة الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pricing') }}">الأسعار</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('creators') }}">صُنّاع المحتوى</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            خدماتنا
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('ecommerce') }}">التجارة الالكترونية</a></li>
                            <li><a class="dropdown-item" href="{{ route('agencies') }}">الوكالات</a></li>
                            <li><a class="dropdown-item" href="{{ route('brands') }}">العلامات التجارية</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">تواصل معنا</a>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-md-center align-items-start">
                    @auth('client')
                        <li class="nav-item">
                            <a href="{{ route('client.dashboard') }}" class="nav-link">
                                <span class="fw-bold">لوحة التحكم</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn log-in-button my-md-0 my-2">تسجيل الخروج</button>
                            </form>
                        </li>
                    @elseauth('creator')
                        <li class="nav-item">
                            <a href="{{ route('creator.dashboard') }}" class="nav-link">
                                <span class="fw-bold">لوحة التحكم</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn log-in-button my-md-0 my-2">تسجيل الخروج</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link login">
                                <span class="fw-bold">تسجيل الدخول</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn log-in-button my-md-0 my-2">اطلب الان</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="{{ asset('website/lib/boostrap5.0.2/popper.min.js') }}"></script>
    <script src="{{ asset('website/lib/boostrap5.0.2/bootstrap.min.js') }}"></script>
    @yield('scripts')
</body>
</html>
