@extends('layouts.app')
@section('title', 'فيدوو للتجارة الإلكترونية - تعزيز مبيعاتك بمحتوى فيديو مميز')
@section('body_class', 'horizontal-layout horizontal-menu footer-static')

@section('meta')
    <meta name="description" content="تعرّف على كيفية استفادة علامتك التجارية من فيدوو لزيادة مبيعاتك عبر الإنترنت من خلال محتوى فيديو مخصص وجذاب يعزز تجربة عملائك في التسوق.">
    <meta name="keywords" content="تعرّف على كيفية استفادة علامتك التجارية من فيدوو لزيادة مبيعاتك عبر الإنترنت من خلال محتوى فيديو مخصص وجذاب يعزز تجربة عملائك في التسوق.">
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
    <link rel="stylesheet" href="{{ asset('website/css/ecommerce-markiting.css') }}" />
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


        


<section>

    <div class="fullwidth-video">
        <video preload="auto" autoplay="" playsinline="" loop="" muted="" class="">
            <source src="{{ asset('website/images/ecommerce/By_Client_Type_eCom_MB_01.mp4') }}" type="video/mp4">
        </video>
        <div class="fullwidth-video-content">

            <h3>
                فيدو - الحل الأمثل لإعلانات الفيديو للتجارة الإلكترونية
            </h3>
            <a type="button" href="{{ route('login.form') }}"
                class="btn main-btn m-auto w-auto custom-btn-width">
                اطلب الفديو الاول لتجارتك الالكترونية
            </a>
        </div>
    </div>

</section>

<div class="container">

    <section class="my-4">
        <div class="row align-items-center">
            <div class="col-md-3">
                
                <p class="fw-bold"> العديد من المتاجر الإلكترونية يعتمد على فيدوو</p>
            </div>
            <div class="col-md-9">

                <div class="slick-ecommerce" dir="ltr" style="direction: ltr;">

                    <div class="slide-content mx-2 img-fluid">
                        <img src="{{ asset('website/images/brands/logo1.png') }}" alt="" srcset="">
                    </div>
                    <div class="slide-content mx-2 img-fluid">
                        <img src="{{ asset('website/images/brands/logo2.png') }}" alt="" srcset="">
                    </div>
                    <div class="slide-content mx-2 img-fluid">
                        <img src="{{ asset('website/images/brands/logo3.png') }}" alt="" srcset="">
                    </div>
                    <div class="slide-content mx-2 img-fluid">
                        <img src="{{ asset('website/images/brands/logo4.png') }}" alt="" srcset="">
                    </div>
                    <div class="slide-content mx-2 img-fluid">
                        <img src="{{ asset('website/images/brands/logo5.png') }}" alt="" srcset="">
                    </div>
                    <div class="slide-content mx-2 img-fluid">
                        <img src="{{ asset('website/images/brands/logo6.png') }}" alt="" srcset="">
                    </div>
                    <div class="slide-content mx-2 img-fluid">
                        <img src="{{ asset('website/images/brands/one-bond.png') }}" alt="" srcset="">
                    </div>

                </div>
            </div>
    </section>
    <section class="my-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1>
                    إعلانات الفيديو لمتجرك الإلكتروني
                </h1>
                <p>
                    انضم إلى شبكة فيدو لصُناع الفيديو والمحررين المعتمدين، الموثوق بهم من قبل أكثر من 20,000 علامة
                    تجارية
                    ووكالة تسويق.
                    عروض حصرية للتجارة الإلكترونية
                    أكثر من 7,000 متجر إلكتروني يعتمد على فيدو

                    إعلانات فيديو فعالة من حيث التكلفة
                    تتساءل لماذا خدماتنا في إنتاج الفيديو ميسورة التكلفة بشكل كبير؟ نحن نتخطى الوسطاء ونقدم لك محتوى
                    فعال بسرع

                </p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('website/images/vidoo-map.png') }}" alt="" srcset="" class="img-fluid">
            </div>
        </div>
    </section>
</div>
<section class="my-4">

    <div class="bg-light p-5">
        <h1 class="text-center">
            لماذا تختار فيدو لإعلانات الفيديو؟
        </h1>

    </div>
    <div class="row justify-content-center">
        <div class="col-md-3 d-grid gap-4">
            <div class="p-xl-5 p-md-1 p-3">

                <img decoding="async" title="wim3" src="{{ asset('website/images/ecommerce/wim3.svg') }}"
                    data-orig-src="{{ asset('website/images/ecommerce/wim3.svg') }}"
                    class="img-responsive wp-image-11009 img-with-aspect-ratio ls-is-cached lazyloaded"
                    alt="eCommerce marketing">

                <p class="fw-bold">إعلانات فيديو ميسورة التكلفة</p>
                <p>
                    نقدم برامج شراكة حصرية وأكبر الخصومات الممكنة
                    للمتاجر الإلكترونية لضمان حصول عملائك على أفضل قيمة مقابل المال.
                </p>
            </div>
        </div>

        <div class="col-md-3 d-grid gap-4">
            <div class="p-xl-5 p-md-1 p-3">
                <img decoding="async" title="wim3" src="{{ asset('website/images/ecommerce/wim1.svg') }}"
                    data-orig-src="{{ asset('website/images/ecommerce/wim1.svg') }}"
                    class="img-responsive wp-image-11009 img-with-aspect-ratio ls-is-cached lazyloaded"
                    alt="eCommerce marketing">

                <p class="fw-bold">
                    سهولة إنشاء المحتوى
                </p>
                <p>
                    وفر الوقت والجهد مع مدير مخصص من فيدو، الذي سيتولى جميع الأعمال العملية لإعداد
                    الفيديوهات لعملائك، مما يمنحك الحرية للتركيز على استراتيجية النمو.
                </p>
            </div>
        </div>
        <div class="col-md-3 d-grid gap-4">
            <div class="p-xl-5 p-md-1 p-3">
                <img decoding="async" title="wim3" src="{{ asset('website/images/ecommerce/wim2.svg') }}"
                    data-orig-src="{{ asset('website/images/ecommerce/wim2.svg') }}"
                    class="img-responsive wp-image-11009 img-with-aspect-ratio ls-is-cached lazyloaded"
                    alt="eCommerce marketing">

                <p class="fw-bold">
                    مبدعون معتمدون فقط
                </p>
                <p>
                    لا داعي للبحث المستمر عن المؤثرين!
                    نحن نوفر لك مجموعة مختارة من المبدعين
                    المعتمدين الذين يمكنهم بدء العمل على مشاريعك فورًا.


                </p>
            </div>
        </div>
    </div>
</section>



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


    $().ready(function () {
        tt = $('.slick-ecommerce').slick({
            // arrows: true,
            loop:true,
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

</script>
@endpush
