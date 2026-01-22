@extends('layouts.app')
@section('title', '')
@section('body_class', 'horizontal-layout horizontal-menu footer-static')

@push('styles')
    <link rel="stylesheet" href="{{ asset('website/lib/boostrap5.0.2/bootstrap.rtl.min.css') }}">
    <link href="{{ asset('website/lib/font/Messiri.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="../cdn.jsdelivr.net/npm/swiper%4010/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="../cdn.jsdelivr.net/gh/kenwheeler/slick%401.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="../cdn.jsdelivr.net/gh/kenwheeler/slick%401.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="../kenwheeler.github.io/slick/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/btns.css') }}" />
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
    <script src="../cdn.jsdelivr.net/npm/swiper%4010/swiper-bundle.min.js"></script>
    <script type="text/javascript" class="flasher-js">(function() {    var rootScript = '../cdn.jsdelivr.net/npm/%40flasher/flasher%401.3.2/dist/flasher.min.js';    var FLASHER_FLASH_BAG_PLACE_HOLDER = {};    var options = mergeOptions([], FLASHER_FLASH_BAG_PLACE_HOLDER);    function mergeOptions(first, second) {        return {            context: merge(first.context || {}, second.context || {}),            envelopes: merge(first.envelopes || [], second.envelopes || []),            options: merge(first.options || {}, second.options || {}),            scripts: merge(first.scripts || [], second.scripts || []),            styles: merge(first.styles || [], second.styles || []),        };    }    function merge(first, second) {        if (Array.isArray(first) && Array.isArray(second)) {            return first.concat(second).filter(function(item, index, array) {                return array.indexOf(item) === index;            });        }        return Object.assign({}, first, second);    }    function renderOptions(options) {        if(!window.hasOwnProperty('flasher')) {            console.error('Flasher is not loaded');            return;        }        requestAnimationFrame(function () {            window.flasher.render(options);        });    }    function render(options) {        if ('loading' !== document.readyState) {            renderOptions(options);            return;        }        document.addEventListener('DOMContentLoaded', function() {            renderOptions(options);        });    }    if (1 === document.querySelectorAll('script.flasher-js').length) {        document.addEventListener('flasher:render', function (event) {            render(event.detail);        });            }    if (window.hasOwnProperty('flasher') || !rootScript || document.querySelector('script[src="' + rootScript + '"]')) {        render(options);    } else {        var tag = document.createElement('script');        tag.setAttribute('src', rootScript);        tag.setAttribute('type', 'text/javascript');        tag.onload = function () {            render(options);        };        document.head.appendChild(tag);    }})();</script>
@endpush

@section('content')
<!-- Google Tag Manager -->

<!-- End Google Tag Manager -->
        <!-- BEGIN: Main Menu-->
        
        <!-- END: Main Menu-->


        

<div class="container">
    <div>

        <h1 class="main-color-gradient">سياسة استرداد الأموال</h1>
        <p class="fw-bold">مرحباً بكم في فيدو!</p>
        <p>نُقدّر ثقتكم بنا ونلتزم بتوفير تجربة مُرضية. تُوضح سياسة استرداد الأموال هذه كيفية التعامل مع طلبات استرداد الأموال في حالة عدم رضائكم عن خدماتنا.</p>
    </div>

    <div class="section-gap">

        <h3 class="sub-color-gradient">متى يمكن استرداد الأموال؟</h3>
        <p>نُقدم مُدة مُحدّدة لاسترداد الأموال لجميع المشتريات من خلال منصة فيدوو.
             يمكن طلب استرداد الأموال داخل هذه المُدة في حالة عدم رضائكم عن
              الخدمة أو إذا كانت هناك مشكلة فنية تُعيق استخدامكم للمنصة.</p>
    </div>
    <div class="section-gap">

        <h3 class="sub-color-gradient">كيف يمكن طلب استرداد الأموال؟</h3>
        <p>يمكن طلب استرداد الأموال من خلال [ دعم العملاء ].
            يُرجى تقديم معلومات واضحة عن سبب طلب
            الاسترداد وتاريخ الشراء وبيانات حسابك.
        </p>
    </div>

    <div class="section-gap">
        <h3 class="sub-color-gradient">متى يتم معالجة طلب استرداد الأموال؟</h3>
        <p>نُعالج طلبات استرداد الأموال في أسرع وقت مُمكن. يُرجى ملاحظة أن المُدة المُحتملة لإكمال الاسترداد تعتمد على طريقة الدفع التي استُخدمت في الشراء.</p>
    </div>

    <div class="section-gap">
        <h3 class="sub-color-gradient">شروط الاسترداد:</h3>
        <ul>
            <li><span>داخل المُدة المُحدّدة:</span> يجب أن يكون طلب الاسترداد داخل المُدة المُحدّدة للاسترداد.</li>
            <li><span>مبرّر ومُتوافق:</span> يُجب أن يكون طلب الاسترداد مُبرّرًا و متوافقًا مع سياسة استرداد الأموال.</li>
            <li><span>مستندات إضافية:</span> قد نطلب منك تقديم مستندات أو معلومات إضافية للتأكيد على طلب الاسترداد.</li>
        </ul>
    </div>

     <div class="note">
        <p>نحن نُقدم سياسة استرداد الأموال لضمان رضائكم عن خدماتنا و تقديم تجربة مُرضية. نُرجو منكم مراجعة هذه السياسة بعناية قبل شراء أي خدمة من خلال منصة فيدوو.</p>
    </div>

    <h4 class="sub-color-gradient">تواصل معنا:</h4>
    <p>يمكنكم الاتصال بنا على <a href="mailto:hello@vidoo.app" class="main-text">hello@vidoo.app</a> إذا كانت لديكم أي أسئلة أو تعليقات حول سياسة استرداد الأموال هذه.</p>

    <br><br>
    <p class="fw-bold">شكرًا لكم على ثقتكم بنا!</p>
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
