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
    <link rel="stylesheet" href="{{ asset('website/css/policy.css') }}" />
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

    <div class="section-gap">

        <h1 class="main-color-gradient">سياسة الخصوصية</h1>
        <p class="fw-bold">مرحباً بكم في فيدو!</p>
        <p>نُقدّر خصوصيتكم ونلتزم بحمايتها. هذه سياسة الخصوصية تُوضح كيفية جمعنا واستخدامنا وحماية معلوماتكم الشخصية عند
            استخدامكم منصة فيدوو.</p>
    </div>

    <div class="section-gap">

        <h3 class="sub-color-gradient">ما هي المعلومات التي نجمعها؟</h3>
        <p>نحن نجمع المعلومات الشخصية الأساسية التي تُقدمها لنا عند إنشاء حساب على فيدو، مثل:</p>
        <ul class="policy-ul">
            <li><span class="fw-bold">اسم المستخدم:</span> اسم المستخدم الذي تختاره للظهور على المنصة.</li>
            <li><span class="fw-bold">البريد الإلكتروني:</span> عنوان البريد الإلكتروني الخاص بك.</li>
            <li><span class="fw-bold">كلمة المرور:</span> كلمة المرور التي تختارها لحماية حسابك.</li>
            <li><span class="fw-bold">معلومات التعريف:</span> قد نطلب منك تقديم معلومات إضافية، مثل اسمك الكامل، رقم
                الهاتف، ومعلومات الاتصال.</li>
        </ul>
        <p>نحن نجمع أيضًا معلومات استخدام المنصة مثل:</p>
        <ul class="policy-ul">
            <li><span>تاريخ ووقت استخدام المنصة:</span> نُسجل متى وأين تستخدم منصة فيدوو.</li>
            <li><span>الأنشطة داخل المنصة:</span> نُسجل ما هي المحتوىات التي تتصفحها أو تتفاعل معها.</li>
            <li><span>معلومات الجهاز:</span> نُسجل نوع الجهاز الذي تستخدمه وإصدار نظام التشغيل.</li>
        </ul>
    </div>

    <div class="section-gap">
        <h3 class="sub-color-gradient">كيف نستخدم المعلومات التي نجمعها؟</h3>
        <p>نُستخدم المعلومات التي نُجمعها لأهداف محددة مثل:</p>
        <ul class="policy-ul">
            <li><span class="fw-bold">تقديم خدمة أفضل:</span> لضمان عمل المنصة بكفاءة وتقديم تجربة مستخدم مُحسّنة.</li>
            <li><span class="fw-bold">تخصيص المحتوى:</span> عرض المحتوى المناسب لك والمُلائم لإهتماماتك.</li>
            <li><span class="fw-bold">اتصالات مهمة:</span> إرسال إشعارات ورسائل هامّة تُخصّصك مثل التحديثات والعروض
                الخاصة.</li>
            <li><span class="fw-bold">التحليل والتطوير:</span> فهم كيف يستخدم المستخدمون المنصة وتحسين الأداء وإضافة
                ميزات جديدة.</li>
        </ul>

    </div>

    <div class="section-gap">

        <h3 class="sub-color-gradient">مشاركة المعلومات:</h3>
        <p>نحن لا نُشارك معلوماتك الشخصية مع أطراف ثالثة لأغراض تسويقية. نُشارك هذه المعلومات فقط مع الجهة التي نستخدم
            خدمات سحابة البيانات منها وهي شركة [ذكر اسم شركة الخدمات السحابية] لضمان أمن وحماية بياناتك.</p>
    </div>

    <div class="section-gap">

        <h3 class="sub-color-gradient">حماية المعلومات:</h3>
        <p>نستخدم تدابير أمنية متطورة لحماية معلوماتك الشخصية من الوصول غير المُرخص له والاستخدام الخاطئ والتغييرات
            والضياع والتدمير.</p>
    </div>

    <div class="section-gap">

        <h3 class="sub-color-gradient">حقوقك:</h3>
        <p>تُمنحك سياسة الخصوصية حقوق مُحدّدة فيما يتعلق بمعلوماتك الشخصية:</p>
        <ul class="policy-ul">
            <li><span class="fw-bold">حق الوصول:</span> حق معرفة ما هي المعلومات التي نُخزنها عنك.</li>
            <li><span class="fw-bold">حق التعديل:</span> حق تعديل أو تصحيح أي معلومات غير دقيقة عنك.</li>
            <li><span class="fw-bold">حق الحذف:</span> حق حذف معلوماتك الشخصية من قاعدة بياناتنا.</li>
            <li><span class="fw-bold">حق الرفض:</span> حق الرفض من استخدام معلوماتك الشخصية لأغراض تسويقية.</li>
        </ul>
    </div>

    <div class="section-gap">

        <h3 class="sub-color-gradient">تواصل معنا:</h3>
        <p>يمكنكم الاتصال بنا على <a href="mailto:hello@vidoo.app" class="main-text">hello@vidoo.app</a> إذا كانت لديكم
            أي أسئلة أو تعليقات حول سياسة الخصوصية هذه.</p>
    </div>

    <div class="section-gap">
        <h3 class="sub-color-gradient">التغييرات على سياسة الخصوصية:</h3>
        <p>نحتفظ بحق تعديل هذه سياسة الخصوصية في أي وقت. سوف نُنشر أي تغييرات على المنصة ونُوصي بمراجعة هذه السياسة
            بانتظام. استمرار استخدامكم للمنصة بعد نشر أي تغييرات سوف يشكل اعترافًا بقبولكم للتغييرات.</p>

    </div>

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
