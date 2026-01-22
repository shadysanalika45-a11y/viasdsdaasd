@extends('layouts.app')
@section('title', 'تواصل معنا - فيدوو')
@section('body_class', 'horizontal-layout horizontal-menu footer-static')

@section('meta')
    <meta name="description" content="هل لديك أسئلة أو تعليقات؟ تواصل معنا عبر صفحة اتصل بنا في فيدوو، فريقنا هنا لدعمك والإجابة على استفساراتك.">
    <meta name="keywords" content="هل لديك أسئلة أو تعليقات؟ تواصل معنا عبر صفحة اتصل بنا في فيدوو، فريقنا هنا لدعمك والإجابة على استفساراتك.">
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('website/lib/boostrap5.0.2/bootstrap.rtl.min.css') }}">
    <link href="{{ asset('website/lib/font/Messiri.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('website/lib/swiper/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('website/lib/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('website/lib/slick/slick-theme.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('website/lib/slick/github-slick-theme.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/btns.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/css/for-agency.css') }}" />
    <link href="{{ asset('website/lib/font/Messiri.css') }}" rel="stylesheet">
    <link href="{{ asset('users-asset/system/css/base.css') }}" rel="stylesheet">
@endpush

@push('head_scripts')
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-FF22N97D');</script>
    <script src="{{ asset('website/lib/boostrap5.0.2/popper.min.js') }}"></script>
    <script src="{{ asset('website/lib/boostrap5.0.2/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website/lib/swiper/swiper-bundle.min.js') }}"></script>
    <script type="text/javascript" class="flasher-js">(function() {    var rootScript = '../cdn.jsdelivr.net/npm/%40flasher/flasher%401.3.2/dist/flasher.min.js';    var FLASHER_FLASH_BAG_PLACE_HOLDER = {};    var options = mergeOptions([], FLASHER_FLASH_BAG_PLACE_HOLDER);    function mergeOptions(first, second) {        return {            context: merge(first.context || {}, second.context || {}),            envelopes: merge(first.envelopes || [], second.envelopes || []),            options: merge(first.options || {}, second.options || {}),            scripts: merge(first.scripts || [], second.scripts || []),            styles: merge(first.styles || [], second.styles || []),        };    }    function merge(first, second) {        if (Array.isArray(first) && Array.isArray(second)) {            return first.concat(second).filter(function(item, index, array) {                return array.indexOf(item) === index;            });        }        return Object.assign({}, first, second);    }    function renderOptions(options) {        if(!window.hasOwnProperty('flasher')) {            console.error('Flasher is not loaded');            return;        }        requestAnimationFrame(function () {            window.flasher.render(options);        });    }    function render(options) {        if ('loading' !== document.readyState) {            renderOptions(options);            return;        }        document.addEventListener('DOMContentLoaded', function() {            renderOptions(options);        });    }    if (1 === document.querySelectorAll('script.flasher-js').length) {        document.addEventListener('flasher:render', function (event) {            render(event.detail);        });            }    if (window.hasOwnProperty('flasher') || !rootScript || document.querySelector('script[src="' + rootScript + '"]')) {        render(options);    } else {        var tag = document.createElement('script');        tag.setAttribute('src', rootScript);        tag.setAttribute('type', 'text/javascript');        tag.onload = function () {            render(options);        };        document.head.appendChild(tag);    }})();</script>
@endpush

@section('content')
<!-- Google Tag Manager -->

<!-- End Google Tag Manager -->
        <!-- BEGIN: Main Menu-->
        
        <!-- END: Main Menu-->


        
<div class="container">
    <div class="row">


    <h1 class="main-color-gradient">
        ابق على تواصل مع فريق فيدوو
    </h1>

    <section class="my-4 ">
        <div>

             <p>
                يمكنكم الاتصال بنا على <a href="mailto:hello@vidoo.app" class="main-text">hello@vidoo.app</a> إذا كانت لديكم أي أسئلة أو تعليقات حول منصة فيدوو. سيتم الرد عليكم خلال 24 ساعة.
             </p>

        </div>

        <div class="agency-form">

            <p>او يمكنكم ترك البريد الالكتروني الخاص بكم واستفساركم وفريق الدعم سوف يتواصل معكم في اقرب وقت</p>

            <form method="POST" action="https://vidoo.app/support">
            <div class="row">
                <input type="hidden" name="_token" value="p6U4weZ680MitaoiaLfJkptsRFKXRmXfkgEtpLev">
                <div class="col-md-6 my-2">



                    <label class="fw-bold mb-2">الاسم</label>
                    <input type="text" class="form-control agency-form-input" name="name" value="" placeholder="الاسم*">
                                    </div>
                <div class="col-md-6 my-2">

                    <label class="fw-bold mb-2">الموقع الإلكتروني (اختياري)</label>

                    <input type="text" class="form-control agency-form-input" name="url" value="" placeholder="الموقع الإلكتروني ">
                                    </div>
                <div class="col-md-6 my-2">

                    <label class="fw-bold mb-2">عنوان البريد الإلكتروني</label>
                    <input type="email" class="form-control agency-form-input" name="email" value="" placeholder="بريدك الإلكتروني*" required>
                                    </div>
                <div class="col-md-6 my-2">

                    <label class="fw-bold mb-2">رقم الجوال</label>
                    <input type="text" class="form-control agency-form-input" name="phone" value="" placeholder="رقم الجوال*">
                                    </div>

                <div class="col-md-12 my-2">

                    <label class="fw-bold mb-2">كيف يمكننا مساعدك؟</label>

                    <textarea rows="5" class="form-control agency-form-input" name="message" placeholder="اكتب رسالتك">
                        
                    </textarea>

                                    </div>


            </div>
            <button class="btn main-btn mt-4">إرسال</button>
        </div>


    </section>
    </div>
</div>


        <!-- BEGIN: Footer-->
@endsection

@push('scripts')
    <script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-FF22N97D');
</script>
    <script>
        function toggleNav() {
            var nav = document.getElementById('navbarNav');
            // nav.classList.toggle('show');
        }
    </script>
    <script type="text/javascript" src="{{ asset('website/lib/jquery/jquery-1.11.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('website/lib/jquery/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('website/lib/slick/slick.min.js') }}"></script>
    <script src="{{ asset('website/lib/slick/slick-carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('website/lib/slick/kenwheeler-slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('website/lib/jquery/jquery-1.11.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('website/lib/jquery/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('website/lib/slick/slick.min.js') }}"></script>
    <script src="{{ asset('website/lib/slick/slick-carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('website/lib/slick/kenwheeler-slick.min.js') }}"></script>
    <script>
    $(document).ready(function () {


      $(document).ready(function () {


$().ready(function () {
    $('.slick-case-study').slick({
        // arrows: true,
        loop: true,
        centerPadding: "150px",
        infinite: true,

        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        // centerMode: true,
        // focusOnSelect: true,
        // activeOnSelect:true

        responsive: [

            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,


                }
            }

        ]
    });
});


});


    });

</script>
@endpush
