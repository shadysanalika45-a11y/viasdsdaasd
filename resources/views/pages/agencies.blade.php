@extends('layouts.app')
@section('title', 'احصل على فيدوو لوكالتك')
@section('body_class', 'horizontal-layout horizontal-menu footer-static')

@section('meta')
    <meta name="description" content="احصل على فيدوو لوكالتك">
    <meta name="keywords" content="احصل على فيدوو لوكالتك">
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

    

    <section class="my-4">
        <div class="row align-items-center my-2">
            <div class="col-md-4">
                <h1>
                    أول تطبيق UGC في المنطقة العربية
                </h1>
                <p class="mt-4">
                    مرحبًا بكم في فيدو، الوجهة الأولى لصناعة المحتوى المستخدم في المنطقة العربية. نحن هنا لمساعدة وكالات
                    التسويق في تقديم حملات دعائية مذهلة من خلال محتوى أصيل وأصوات حقيقية. فيدوو هو الحل الأمثل لتحقيق
                    نتائج فعالة وإبداعية لعملائك.
                </p>
            </div>
            <div class="col-md-8">
                <img src="{{ asset('website/images/vidoo-map.png') }}" alt="" srcset="" class="img-fluid">
            </div>
        </div>
    </section>
</div>

<section class="my-4 agencies">

    <div class="bg-light p-5 mb-2">
        <h1 class="text-center">
            لماذا تختار فيدوو لوكالتك؟
        </h1>

    </div>
    <div class="row justify-content-center bg-light">
        <div class="col-md-3 d-grid gap-4 bg-white">
            <div class="p-5">



                <p class="fw-bold">

                    إنتاج محتوى مستخدم مخصص
                </p>
                <p>
                    سنقوم بجمع محتوى من المستخدمين يتناسب تمامًا مع أهداف حملتك الإعلانية،
                    سواء كنت تبحث عن فيديوهات مراجعات، أو قصص نجاح، أو حتى تحديات ممتعة.

                </p>
            </div>
        </div>

        <div class="col-md-3 d-grid gap-4 bg-white">
            <div class="p-5">


                <p class="fw-bold">
                    إدارة الحملات
                </p>
                <p>

                    سنساعدك في تنظيم وإدارة حملاتك من البداية
                    حتى النهاية، مع التركيز على تحقيق أفضل
                    النتائج وزيادة التفاعل مع جمهورك المستهدف.
                </p>
            </div>
        </div>
        <div class="col-md-3 d-grid gap-4 bg-white">
            <div class="p-5">


                <p class="fw-bold">

                    تحليل الأداء
                </p>
                <p>
                    من خلال أدوات التحليل المتقدمة لدينا
                    ، يمكنك متابعة أداء حملاتك وفهم مدى تأثيرها
                    ، مما يمكنك من اتخاذ قرارات مبنية
                    على البيانات لتحسين نتائجك المستقبلية.
                </p>
            </div>
        </div>
        <div class="col-md-3 d-grid gap-4 bg-white">
            <div class="p-5">


                <p class="fw-bold">
                    تكلفة فعالة
                </p>
                <p>

                    بدلاً من الإنفاق الكبير على إنتاج الفيديوهات التقليدية، يمكنك الآن
                    الحصول على محتوى مميز وبجودة عالية من خلال
                    مستخدمينا، مما يساعدك على تحقيق أقصى استفادة من ميزانيتك.
                </p>
            </div>
        </div>
    </div>
    <div class="text-center">

        <a type="button" href="{{ route('login.form') }}" class="btn main-btn m-auto text-center w-auto">
            احصل علي فيدوو لوكالتك
        </a>
    </div>
</section>

<div class="container">

    <section class="my-5">
        <div class="row client_review align-items-center">
            <div class="col-md-6 content_review">
                <h1>
                    احصل على إعلانات فيديو لمتجرك الإلكتروني
                </h1>

                <p>
                    عندما تعيقك قيود الميزانية
                    أو الوقت أو ملكية المحتوى، نوصي باستخدام فيدو. يسمح لنا فيدوو
                    بالعمل مع مبدعين لتطوير محتوى أصيل يتناغم مع متجرك الإلكتروني.


                </p>

                <p>
                    في حين أن هذه الإبداعات قد لا تتمتع ببريق
                    الإعلانات التقليدية، فإن هذه الإبداعات النابعة من العملاء
                    تبني روابط حقيقية مع الجمهور، وتنسجم مع المحتوى على منصات
                    التواصل الاجتماعي بينما تظل بارزة بما يكفي لتحقيق التحويلات.


                </p>
            </div>
            <div class="col-md-6 media_review">
                
                <img decoding="async" src="{{ asset('website/images/agencies/lines.svg') }}"
                    data-orig-src="https://vidoo.app/website/images/agencies/lines.svg" class="pin2 lazyloaded"
                    alt="For Agencies">
                <div class="thumbnail_client">

                    <img class="image_client" src="{{ asset('website/images/img-1.png') }}" alt="" srcset="">
                    

                    
                </div>
            </div>
        </div>
    </section>

    <section class="my-4 ">
        <div class="agency-form">
            <h1 class="agency-form-title">
                مهتم بعروضنا الحصرية للتجارة الإلكترونية؟
            </h1>
            <p>نحن هنا لمساعدتك في كل خطوة. تواصل معنا الآن وابدأ رحلتك نحو نجاح غير مسبوق مع فيدو!
            </p>
            
            <div class="row">


                <form method="POST" action="{{ route('agencies.submit') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 my-2">

                            <label class="fw-bold mb-2">اسم المتجر</label>
                            <input type="text" class="form-control agency-form-input" name="name"
                                value="" placeholder="اسم متجرك*">
                                                    </div>
                        <div class="col-md-6 my-2">

                            <label class="fw-bold mb-2">موقع المتجر</label>
                            <input type="text" class="form-control agency-form-input" name="url"
                                value="" placeholder="موقع متجرك*">
                                                    </div>
                        <div class="col-md-6 my-2">

                            <label class="fw-bold mb-2">عنوان البريد الإلكتروني</label>
                            <input type="email" class="form-control agency-form-input" name="email"
                                value="" placeholder="بريدك الإلكتروني*" required>
                                                    </div>
                        <div class="col-md-6 my-2">

                            <label class="fw-bold mb-2">الهاتف</label>
                            <input type="text" class="form-control agency-form-input" name="phone"
                                value="" placeholder="رقم هاتفك*">
                                                    </div>

                        


                    </div>
                    <button class="btn main-btn mt-4">ارسال</button>
                </form>
            </div>
            
        </div>

    </section>
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


        $().ready(function () {
            $('.slick-agency').slick({
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

</script>
@endpush
