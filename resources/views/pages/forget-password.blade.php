@extends('layouts.app')
@section('title', 'إعادة تعيين كلمة المرور - فيدوو')
@section('body_class', 'horizontal-layout horizontal-menu blank-page navbar-floating footer-static')
@section('hide_header', 'true')
@section('hide_footer', 'true')

@section('meta')
    <meta name="description" content="هل نسيت كلمة المرور؟ أدخل بريدك الإلكتروني لإعادة تعيين كلمة المرور الخاصة بحسابك على فيدوو بسهولة وأمان.">
    <meta name="keywords" content="هل نسيت كلمة المرور؟ أدخل بريدك الإلكتروني لإعادة تعيين كلمة المرور الخاصة بحسابك على فيدوو بسهولة وأمان.">
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
        href="{{ asset('users-asset/css-rtl/core/menu/menu-types/horizontal-menu.css') }}">
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
    <script type="text/javascript" class="flasher-js">(function() {    var rootScript = '../cdn.jsdelivr.net/npm/%40flasher/flasher%401.3.2/dist/flasher.min.js';    var FLASHER_FLASH_BAG_PLACE_HOLDER = {};    var options = mergeOptions({"envelopes":[{"notification":{"type":"error","message":"\u064a\u062c\u0628 \u0639\u0644\u064a\u0643 \u062a\u0633\u062c\u064a\u0644 \u0627\u0644\u062f\u062e\u0648\u0644 \u0623\u0648\u0644\u0627\u064b.","title":"\u062e\u0637\u0627\u0654","options":[]},"handler":"toastr","created_at":"2025-11-22 13:14:38","uuid":"000000000000075b0000000000000000","priority":0},{"notification":{"type":"error","message":"\u064a\u062c\u0628 \u0639\u0644\u064a\u0643 \u062a\u0633\u062c\u064a\u0644 \u0627\u0644\u062f\u062e\u0648\u0644 \u0623\u0648\u0644\u0627\u064b.","title":"\u062e\u0637\u0627\u0654","options":[]},"handler":"toastr","created_at":"2025-11-22 13:14:38","uuid":"00000000000007790000000000000000","priority":0},{"notification":{"type":"error","message":"\u064a\u062c\u0628 \u0639\u0644\u064a\u0643 \u062a\u0633\u062c\u064a\u0644 \u0627\u0644\u062f\u062e\u0648\u0644 \u0623\u0648\u0644\u0627\u064b.","title":"\u062e\u0637\u0627\u0654","options":[]},"handler":"toastr","created_at":"2025-11-22 13:14:39","uuid":"00000000000007820000000000000000","priority":0},{"notification":{"type":"error","message":"\u064a\u062c\u0628 \u0639\u0644\u064a\u0643 \u062a\u0633\u062c\u064a\u0644 \u0627\u0644\u062f\u062e\u0648\u0644 \u0623\u0648\u0644\u0627\u064b.","title":"\u062e\u0637\u0627\u0654","options":[]},"handler":"toastr","created_at":"2025-11-22 13:14:39","uuid":"000000000000078b0000000000000000","priority":0},{"notification":{"type":"error","message":"\u064a\u062c\u0628 \u0639\u0644\u064a\u0643 \u062a\u0633\u062c\u064a\u0644 \u0627\u0644\u062f\u062e\u0648\u0644 \u0623\u0648\u0644\u0627\u064b.","title":"\u062e\u0637\u0627\u0654","options":[]},"handler":"toastr","created_at":"2025-11-22 13:14:40","uuid":"00000000000007940000000000000000","priority":0},{"notification":{"type":"error","message":"\u064a\u062c\u0628 \u0639\u0644\u064a\u0643 \u062a\u0633\u062c\u064a\u0644 \u0627\u0644\u062f\u062e\u0648\u0644 \u0623\u0648\u0644\u0627\u064b.","title":"\u062e\u0637\u0627\u0654","options":[]},"handler":"toastr","created_at":"2025-11-22 13:14:45","uuid":"00000000000007880000000000000000","priority":0},{"notification":{"type":"error","message":"\u064a\u062c\u0628 \u0639\u0644\u064a\u0643 \u062a\u0633\u062c\u064a\u0644 \u0627\u0644\u062f\u062e\u0648\u0644 \u0623\u0648\u0644\u0627\u064b.","title":"\u062e\u0637\u0627\u0654","options":[]},"handler":"toastr","created_at":"2025-11-22 13:14:56","uuid":"00000000000007910000000000000000","priority":0},{"notification":{"type":"error","message":"\u064a\u062c\u0628 \u0639\u0644\u064a\u0643 \u062a\u0633\u062c\u064a\u0644 \u0627\u0644\u062f\u062e\u0648\u0644 \u0623\u0648\u0644\u0627\u064b.","title":"\u062e\u0637\u0627\u0654","options":[]},"handler":"toastr","created_at":"2025-11-22 13:14:56","uuid":"000000000000079a0000000000000000","priority":0},{"notification":{"type":"error","message":"\u064a\u062c\u0628 \u0639\u0644\u064a\u0643 \u062a\u0633\u062c\u064a\u0644 \u0627\u0644\u062f\u062e\u0648\u0644 \u0623\u0648\u0644\u0627\u064b.","title":"\u062e\u0637\u0627\u0654","options":[]},"handler":"toastr","created_at":"2025-11-22 13:14:58","uuid":"00000000000007a30000000000000000","priority":0},{"notification":{"type":"error","message":"\u064a\u062c\u0628 \u0639\u0644\u064a\u0643 \u062a\u0633\u062c\u064a\u0644 \u0627\u0644\u062f\u062e\u0648\u0644 \u0623\u0648\u0644\u0627\u064b.","title":"\u062e\u0637\u0627\u0654","options":[]},"handler":"toastr","created_at":"2025-11-22 13:14:58","uuid":"00000000000007ac0000000000000000","priority":0},{"notification":{"type":"error","message":"\u064a\u062c\u0628 \u0639\u0644\u064a\u0643 \u062a\u0633\u062c\u064a\u0644 \u0627\u0644\u062f\u062e\u0648\u0644 \u0623\u0648\u0644\u0627\u064b.","title":"\u062e\u0637\u0627\u0654","options":[]},"handler":"toastr","created_at":"2025-11-22 13:15:00","uuid":"00000000000007b50000000000000000","priority":0},{"notification":{"type":"error","message":"\u064a\u062c\u0628 \u0639\u0644\u064a\u0643 \u062a\u0633\u062c\u064a\u0644 \u0627\u0644\u062f\u062e\u0648\u0644 \u0623\u0648\u0644\u0627\u064b.","title":"\u062e\u0637\u0627\u0654","options":[]},"handler":"toastr","created_at":"2025-11-22 13:15:01","uuid":"00000000000007be0000000000000000","priority":0},{"notification":{"type":"error","message":"\u064a\u062c\u0628 \u0639\u0644\u064a\u0643 \u062a\u0633\u062c\u064a\u0644 \u0627\u0644\u062f\u062e\u0648\u0644 \u0623\u0648\u0644\u0627\u064b.","title":"\u062e\u0637\u0627\u0654","options":[]},"handler":"toastr","created_at":"2025-11-22 13:15:03","uuid":"00000000000007c70000000000000000","priority":0},{"notification":{"type":"error","message":"\u064a\u062c\u0628 \u0639\u0644\u064a\u0643 \u062a\u0633\u062c\u064a\u0644 \u0627\u0644\u062f\u062e\u0648\u0644 \u0623\u0648\u0644\u0627\u064b.","title":"\u062e\u0637\u0627\u0654","options":[]},"handler":"toastr","created_at":"2025-11-22 13:15:04","uuid":"00000000000007d00000000000000000","priority":0}],"scripts":["https:\/\/cdn.jsdelivr.net\/npm\/jquery@3.6.3\/dist\/jquery.min.js","https:\/\/cdn.jsdelivr.net\/npm\/@flasher\/flasher-toastr@1.2.4\/dist\/flasher-toastr.min.js"],"options":{"toastr":[]}}, FLASHER_FLASH_BAG_PLACE_HOLDER);    function mergeOptions(first, second) {        return {            context: merge(first.context || {}, second.context || {}),            envelopes: merge(first.envelopes || [], second.envelopes || []),            options: merge(first.options || {}, second.options || {}),            scripts: merge(first.scripts || [], second.scripts || []),            styles: merge(first.styles || [], second.styles || []),        };    }    function merge(first, second) {        if (Array.isArray(first) && Array.isArray(second)) {            return first.concat(second).filter(function(item, index, array) {                return array.indexOf(item) === index;            });        }        return Object.assign({}, first, second);    }    function renderOptions(options) {        if(!window.hasOwnProperty('flasher')) {            console.error('Flasher is not loaded');            return;        }        requestAnimationFrame(function () {            window.flasher.render(options);        });    }    function render(options) {        if ('loading' !== document.readyState) {            renderOptions(options);            return;        }        document.addEventListener('DOMContentLoaded', function() {            renderOptions(options);        });    }    if (1 === document.querySelectorAll('script.flasher-js').length) {        document.addEventListener('flasher:render', function (event) {            render(event.detail);        });            }    if (window.hasOwnProperty('flasher') || !rootScript || document.querySelector('script[src="' + rootScript + '"]')) {        render(options);    } else {        var tag = document.createElement('script');        tag.setAttribute('src', rootScript);        tag.setAttribute('type', 'text/javascript');        tag.onload = function () {            render(options);        };        document.head.appendChild(tag);    }})();</script>
@endpush

@section('content')
<!-- Google Tag Manager -->

<!-- End Google Tag Manager -->
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <!-- Forgot Password basic -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="{{ route('home') }}" class="brand-logo">
                                    <img src="{{ asset('users-asset/images/logo/logo-2.png') }}" width="150px" alt="logo">
                                </a>

                                <h4 class="card-title mb-1">هل نسيت كلمة المرور؟ 🔒</h4>
                                <p class="card-text mb-2">أدخل بريدك الإلكتروني وسنرسل لك تعليمات لإعادة تعيين كلمة المرور الخاصة بك </p>

                                <form class="auth-forgot-password-form mt-2"
                                    action="https://vidoo.app/forget-password" method="POST">
                                    <input type="hidden" name="_token" value="p6U4weZ680MitaoiaLfJkptsRFKXRmXfkgEtpLev">                                    <div class="mb-1">
                                        <label for="forgot-password-email"
                                            class="form-label">البريد الإلكتروني</label>
                                        <input type="email" class="form-control" id="forgot-password-email" name="email"
                                            aria-describedby="forgot-password-email" tabindex="1" autofocus />
                                                                            </div>
                                    <button class="btn btn-primary w-100"
                                        tabindex="2">ارسال رابط اعادة تعيين كلمة المرور</button>
                                </form>

                                <p class="text-center mt-2">
                                    <a href="{{ route('login.form') }}"> <i
                                            data-feather="chevron-left"></i>رجوع لتسجيل الدخول </a>
                                </p>
                            </div>
                        </div>
                        <!-- /Forgot Password basic -->
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
    <script src="{{ asset('users-asset/vendors/js/ui/jquery.sticky.js') }}"></script>
    <script src="{{ asset('users-asset/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('users-asset/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('users-asset/js/core/app.js') }}"></script>
    <script src="{{ asset('users-asset/js/scripts/pages/auth-forgot-password.js') }}"></script>
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
