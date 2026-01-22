@extends('layouts.app')
@section('title', 'تسجيل الدخول - فيدوو')
@section('body_class', 'vertical-layout vertical-menu-modern blank-page navbar-floating footer-static')
@section('hide_header', 'true')
@section('hide_footer', 'true')

@section('meta')
    <meta name="description" content="سجّل دخولك إلى فيدوو للوصول إلى حسابك وابدأ في إنشاء وتصفح محتوى الفيديو الإبداعي.">
    <meta name="keywords" content="سجّل دخولك إلى فيدوو للوصول إلى حسابك وابدأ في إنشاء وتصفح محتوى الفيديو الإبداعي.">
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('users-asset/vendors/css/vendors-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('users-asset/css-rtl/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('users-asset/css-rtl/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('users-asset/css-rtl/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('users-asset/css-rtl/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('users-asset/css-rtl/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('users-asset/css-rtl/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('users-asset/css-rtl/themes/semi-dark-layout.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('users-asset/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('users-asset/css-rtl/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('users-asset/css-rtl/pages/authentication.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('users-asset/css-rtl/custom-rtl.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('users-asset/assets/css/style-rtl.css') }}">
    <link href="{{ asset('users-asset/system/css/rtl.css') }}" rel="stylesheet">
    <link href="{{ asset('website/lib/font/Messiri.css') }}" rel="stylesheet">
    <link href="{{ asset('users-asset/system/css/base.css') }}" rel="stylesheet">
@endpush

@push('head_scripts')
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-FF22N97D');</script>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-FF22N97D');</script>
    <script type="text/javascript" class="flasher-js">(function() {    var rootScript = '../cdn.jsdelivr.net/npm/%40flasher/flasher%401.3.2/dist/flasher.min.js';    var FLASHER_FLASH_BAG_PLACE_HOLDER = {};    var options = mergeOptions([], FLASHER_FLASH_BAG_PLACE_HOLDER);    function mergeOptions(first, second) {        return {            context: merge(first.context || {}, second.context || {}),            envelopes: merge(first.envelopes || [], second.envelopes || []),            options: merge(first.options || {}, second.options || {}),            scripts: merge(first.scripts || [], second.scripts || []),            styles: merge(first.styles || [], second.styles || []),        };    }    function merge(first, second) {        if (Array.isArray(first) && Array.isArray(second)) {            return first.concat(second).filter(function(item, index, array) {                return array.indexOf(item) === index;            });        }        return Object.assign({}, first, second);    }    function renderOptions(options) {        if(!window.hasOwnProperty('flasher')) {            console.error('Flasher is not loaded');            return;        }        requestAnimationFrame(function () {            window.flasher.render(options);        });    }    function render(options) {        if ('loading' !== document.readyState) {            renderOptions(options);            return;        }        document.addEventListener('DOMContentLoaded', function() {            renderOptions(options);        });    }    if (1 === document.querySelectorAll('script.flasher-js').length) {        document.addEventListener('flasher:render', function (event) {            render(event.detail);        });            }    if (window.hasOwnProperty('flasher') || !rootScript || document.querySelector('script[src="' + rootScript + '"]')) {        render(options);    } else {        var tag = document.createElement('script');        tag.setAttribute('src', rootScript);        tag.setAttribute('type', 'text/javascript');        tag.onload = function () {            render(options);        };        document.head.appendChild(tag);    }})();</script>
@endpush

@section('content')
<!-- BEGIN: Content-->
    <!-- Google Tag Manager -->

<!-- End Google Tag Manager -->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <!-- Login basic -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="{{ route('home') }}" class="brand-logo">
                                    <img src="{{ asset('users-asset/images/logo/logo-2.png') }}" width="150px" alt="logo">
                                </a>
                                <h4 class="card-title mb-1">مرحبًا بعودتك إلى فيدوو! 👋</h4>
                                <p class="card-text mb-2">سجّل دخولك للوصول إلى أدواتك المفضلة، متابعة مشاريعك، والتواصل مع صُناع المحتوى والعلامات التجارية. رحلتك الإبداعية تبدأ هنا!</p>

                                <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="mb-1">
                                        <label for="login-email" class="form-label">البريد الإلكتروني</label>
                                        <input type="text" class="form-control" id="login-email" name="email"
                                            placeholder="john@example.com" aria-describedby="login-email" tabindex="1"
                                            autofocus />
                                                                            </div>

                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label"
                                                for="login-password">كلمة المرور</label>
                                            <a href="{{ route('password.request') }}">
                                                <small>هل نسيت كلمة المرور؟</small>
                                            </a>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge"
                                                id="login-password" name="password" tabindex="2"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="login-password" />
                                            <span class="input-group-text cursor-pointer"><i
                                                    data-feather="eye"></i></span>
                                                                                    </div>
                                    </div>
                                    <div class="mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember-me"
                                                tabindex="3" />
                                            <label class="form-check-label" for="remember-me">
                                                تذكرني </label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100" tabindex="4">تسجيل الدخول</button>
                                </form>

                                <p class="text-center mt-2">
                                    <span>جديد على منصتنا؟</span>
                                    
                                    
                                    <a href="{{ route('client.register') }}">
                                        <span> أنشئ حسابك الآن!</span>
                                    </a>
                                </p>

                                
                            </div>
                        </div>
                        <!-- /Login basic -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    
    
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    
    <!-- END: Page JS-->
@endsection

@push('scripts')
    <script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-FF22N97D');
</script>
    <script src="{{ asset('users-asset/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('users-asset/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('users-asset/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('users-asset/js/core/app.js') }}"></script>
    <script src="{{ asset('users-asset/js/scripts/pages/auth-login.js') }}"></script>
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
@endpush
