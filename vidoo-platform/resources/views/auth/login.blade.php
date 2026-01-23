<!DOCTYPE html>
<html class="loading" lang="ar" data-textdirection="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - فيدوو</title>
    
    <link rel="stylesheet" type="text/css" href="{{ asset('users-asset/vendors/css/vendors-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('users-asset/css-rtl/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('users-asset/css-rtl/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('users-asset/css-rtl/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('users-asset/css-rtl/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('users-asset/css-rtl/pages/authentication.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('users-asset/css-rtl/custom-rtl.css') }}">
    <link href="{{ asset('website/lib/font/Messiri.css') }}" rel="stylesheet">
</head>
<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static">
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="{{ route('home') }}" class="brand-logo">
                                    <img src="{{ asset('users-asset/images/logo/logo-2.png') }}" width="150px" alt="logo">
                                </a>
                                <h4 class="card-title mb-1">مرحبًا بعودتك إلى فيدوو! 👋</h4>
                                <p class="card-text mb-2">سجّل دخولك للوصول إلى أدواتك المفضلة، متابعة مشاريعك، والتواصل مع صُناع المحتوى والعلامات التجارية.</p>

                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                            <p class="mb-0">{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif

                                <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="mb-1">
                                        <label for="login-email" class="form-label">البريد الإلكتروني</label>
                                        <input type="email" class="form-control" id="login-email" name="email"
                                            value="{{ old('email') }}" placeholder="john@example.com" required />
                                    </div>

                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="login-password">كلمة المرور</label>
                                            <a href="#"><small>هل نسيت كلمة المرور؟</small></a>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control" id="login-password" 
                                                name="password" placeholder="············" required />
                                        </div>
                                    </div>
                                    
                                    <div class="mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember" name="remember" />
                                            <label class="form-check-label" for="remember">تذكرني</label>
                                        </div>
                                    </div>
                                    
                                    <button class="btn btn-primary w-100" type="submit">تسجيل الدخول</button>
                                </form>

                                <p class="text-center mt-2">
                                    <span>جديد على منصتنا؟</span>
                                    <a href="{{ route('client.register') }}">
                                        <span> أنشئ حسابك الآن!</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('users-asset/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('users-asset/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('users-asset/js/core/app.js') }}"></script>
</body>
</html>
