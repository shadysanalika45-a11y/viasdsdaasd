@extends('layouts.app')
@section('title', '')
@section('body_class', 'horizontal-layout horizontal-menu footer-static')

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
    <link rel="stylesheet" href="{{ asset('website/css/conditions.css') }}" />
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
    <div>

        <h1 class="main-color-gradient">
            شروط خدمة فيدو

        </h1>

        <p>نحن سعداء بأنكم انضمتم إلى مجتمع فيدو، أول منصة عربية مخصصة للمحتوى المُنشأ من قبل المستخدمين (UGC) في
            المنطقة العربية! نُقدّر ثقتكم بنا، ونلتزم بتوفير تجربة رائعة وسهلة الاستخدام. هذه الشروط والاحكام ("الشروط")
            تحكم استخدامكم لمنصة فيدو والخدمات المقدمة من قبلنا.

            باستخدامكم لتطبيق فيدو، فإنكم توافقون على الالتزام بهذه الشروط. إذا لم توافقوا على هذه الشروط، يرجى عدم
            استخدام التطبيق.

            نحتفظ بحق تعديل هذه الشروط في أي وقت. سنقوم بنشر التغييرات على التطبيق، وننصحكم بمراجعة هذه الشروط بانتظام.
            استمرار استخدامكم للتطبيق بعد نشر أي تغييرات سيشكل اعترافًا بقبولكم لهذه التغييرات.</p>
    </div>

    <div class="section-gap">
        <h3 class="sub-color-gradient">1.ما هو فيدوو ؟</h3>
        <p>فيدو هي منصة عربية
            رائدة للمحتوى المُنشأ من قبل المستخدمين، تُمكّن الشركات والأفراد من إنشاء
            وإدارة محتوى جذاب وفعال، مع التركيز على السوق العربية.

        </p>
        <p>فيدوو تُقدم خدمة انشاء محتوى UGC من خلال افضل صانعي المحتوى في الوطن العربي للشركات و العلامات التجاريه
            الكبري و تقدم ايضاً خطط تسويقيه فعاله و إداره للحسابات.
        </p>
    </div>

    <div class="section-gap">
        <h3 class="sub-color-gradient">2.استخدام فيدو</h3>
        <p>
            يُحظر استخدام التطبيق لأي غرض غير قانوني أو محظور بموجب هذه الشروط.
        </p>

        <div class="sub-titles">

            <div class="">
                <h5>1.2 المحتوى</h5>
                <p>أنتم مسؤولون عن جميع المحتوىات التي تنشرونها على التطبيق. وتوافقون على عدم نشر أي محتوى: </p>

                <p>-غير قانوني أو ضار أو تهديدي أو مسيء أو مُشين أو مُخالف للآداب العامة.
                </p>
                <p>-يُنتهك حقوق الملكية الفكرية لأطراف ثالثة.
                </p>
                <p>-ينطوي على جمع أو نشر معلومات شخصية عن أشخاص آخرين دون موافقتهم.
                </p>
                <p>نحتفظ بحق إزالة أي محتوى من التطبيق، ونحن لسنا مسؤولين عن أي محتوى منشور من قبل مستخدمينا.
                </p>
            </div>

            <div class="">
                <h5>2.2 الخصوصية</h5>
                <p>نُقدّر خصوصيتكم، ونلتزم بحمايتها. تُفصّل سياسة الخصوصية لدينا كيفية جمعنا واستخدامنا معلوماتكم
                    الشخصية. يُرجى مراجعة سياسة الخصوصية لدينا للحصول على معلومات إضافية.
                </p>
            </div>

            <div class="">
                <h5>3.2 التزاماتكم</h5>
                <p>باستخدامكم لتطبيق فيدو، فإنكم توافقون على:</p>
                <p>- الالتزام بقوانين وقواعد استخدام الإنترنت.</p>
                <p>- عدم محاولة اختراق أو تعطيل عمل التطبيق.</p>
                <p>- عدم نشر أي محتوى مُخالف لشروط الخدمة.</p>
                <p>- عدم استخدام أي برامج أو أدوات غير مصرح بها.</p>
            </div>

            <div class="">
                <h5>4.2 الإفصاح</h5>
                <p>
                    نُقرّ بأن التطبيق مُقدم "كما هو" و"متاحًا كما هو". نحن لا نقدم أي ضمانات، سواء صريحة
                    أو ضمنية، فيما يتعلق بالتطبيق أو الخدمات المقدمة من خلاله.
                </p>
            </div>

            <div class="">
                <h5>5.2 التعويض</h5>
                <p>تُوافقون على تعويضنا ودفاعنا وحمايتنا من وإلى أي مطالبات وخسائر ونفقات (بما في ذلك أتعاب المحاماة)
                    الناشئة عن أو المتعلقة باستخدامكم للتطبيق أو انتهاككم لهذه الشروط.
                </p>
            </div>

            <div class="">
                <h5>6.2 القانون الساري</h5>
                <p>تُحكم هذه الشروط وتُفسر وفقًا لقوانين [ذكر الدولة].

                </p>
            </div>
        </div>

    </div>

    <div class="section-gap">
        <h3 class="sub-color-gradient">3. تواصل معنا</h3>
        <p>يمكنكم الاتصال بنا على <a href="mailto:hello@vidoo.app" class="main-text">hello@vidoo.app</a> إذا كانت لديكم
            أي أسئلة أو تعليقات حول هذه الشروط.
        </p>
    </div>

    <div class="section-gap">
        <h3 class="sub-color-gradient">4. اللغة</h3>
        <p>تُعتبر هذه الشروط مُعدّة باللغة العربية. وفي حال وجود أي تناقض بين الترجمة الإنجليزية لهذه الشروط وأي ترجمة
            أخرى، ستُغلب الترجمة العربية.

        </p>
    </div>
    <br><br><br>
    <p class="fw-bold">شكرًا لكم على انضمامكم إلى عائلة فيدوو!</p>
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
