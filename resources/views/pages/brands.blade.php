@extends('layouts.app')
@section('title', 'فيدوو للعلامات التجارية والشركات - تواصل فعال مع جمهورك')
@section('body_class', 'horizontal-layout horizontal-menu footer-static')

@section('meta')
    <meta name="description" content="تعرف على كيفية استخدام فيدوو لإنشاء محتوى فيديو أصيل يعكس هوية علامتك التجارية ويعزز من تفاعل جمهورك وزيادة الولاء.">
    <meta name="keywords" content="تعرف على كيفية استخدام فيدوو لإنشاء محتوى فيديو أصيل يعكس هوية علامتك التجارية ويعزز من تفاعل جمهورك وزيادة الولاء.">
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
    <link rel="stylesheet" href="{{ asset('website/css/case-study.css') }}" />
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
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="vidoo_brands">
                    <h1>هكذا تمكّن فيدوو العلامات التجارية مثلك</h1>
                    <p>في فيدوو، نحن نساعد العلامات التجارية
                        على زيادة التفاعل مع جمهورها وزيادة معدلات
                        التحويل عبر محتوى إبداعي يحقق نتائج ملموسة. بفضل شراكاتنا
                        مع صُناع المحتوى الموهوبين من جميع أنحاء العالم العربي، تمكنت
                        أكثر من 20 علامة تجارية من توسيع نطاق حملاتها التسويقية بنجاح.
                        نحن هنا لدعمك في تحقيق أهدافك التسويقية بأفضل الطرق الممكنة</p>

                    <a type="button" href="{{ route('pricing') }}" class="btn sec-button w-auto">استكشف العروض</a>

                </div>
            </div>
            <div class="col-md-6">
                <div class="hero-media">
                    <video playsinline="true" width="100%" autoplay="true" muted="true" loop="true" preload="auto">
                        <source src="{{ asset('website/images/brands/hero-case-studies-1.mp4') }}"
                            type="video/mp4">
                    </video>
                    <video playsinline="true" width="100%" autoplay="true" muted="true" loop="true" preload="auto">
                        <source src="{{ asset('website/images/brands/1-264.mp4') }}" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>

    </section>

    <section class="mb-4">
        <div class="row align-items-center">
            <div class="col-md-2">
                <p class="fw-bold">
                    العديد من المستخدمين يثقون في فيدوو
                </p>

            </div>
            <div class="col-md-10">

                <div class="slick-case-study" dir="ltr" style="direction: ltr;">


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
        </div>
    </section>

    <section class="my-5">
        <h1 class=text-center>حقق أهدافك مع فيدوو</h1>
        <p class="text-center">في فيدوو، نحن هنا لمساعدتك في تحقيق أهدافك بطرق مبتكرة وفعّالة، من خلال:</p>

        <div class="row">
            <div class="col-md-4">
                <div class="single-testimonial">
                    <div class="testimonial">
                        <div class="thumb-image open-popup">
                            <div class="image">
                                <img class=" lazyloaded img-fluid" decoding="async"
                                    src="{{ asset('website/images/services/service3.png') }}"
                                    data-orig-src="{{ asset('website/images/services/service3.png') }}"
                                    alt="Vidoo case studies">
                            </div>
                            
                        </div>
                        <div class="content">
                            
                            <div class="testimonial-title mt-2">
                                <h3 class="title  ">
                                    الوصول إلى صُناع محتوى مميزين من جميع أنحاء المنطقة</h3>
                            </div>
                            <div class="testimonial-description">
                                
                                <p>
                                    مع فيدوو، يمكنك الوصول إلى مجموعة واسعة من صُناع المحتوى
                                    المبدعين من جميع أنحاء العالم العربي، بما في ذلك مصر،
                                    السعودية، والأردن. نحن نقدم لك الفرصة للتعاون مع أفضل
                                    المبدعين لتقديم محتوى يتناسب مع هويتك ويحقق نتائج متميزة.

                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="single-testimonial">
                    <div class="testimonial">
                        <div class="thumb-image open-popup"
                            >
                            <div class="image">
                                <img class=" lazyloaded img-fluid" decoding="async"
                                    src="{{ asset('website/images/services/service1.png') }}"
                                    data-orig-src="{{ asset('website/images/services/service1.png') }}"
                                    alt="Vidoo case studies">
                            </div>
                            
                        </div>
                        <div class="content">
                            
                            <div class="testimonial-title mt-2">
                                <h3 class="title">تحسين استراتيجياتك التسويقية</h3>
                            </div>
                            <div class="testimonial-description">
                                
                                <p>نساعدك في تطوير استراتيجيات تسويقية قوية تستفيد من إبداع صُناع المحتوى
                                    المتنوعين لدينا. بفضل هذه الاستراتيجيات، يمكنك تعزيز التفاعل
                                    والمشاركة مع جمهورك المستهدف وزيادة تأثير علامتك التجارية.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="single-testimonial">
                    <div class="testimonial">
                        <div class="thumb-image open-popup">
                            <div class="image">
                                <img class=" lazyloaded img-fluid" decoding="async"
                                    src="{{ asset('website/images/services/service2.png') }}"
                                    data-orig-src="{{ asset('website/images/services/service2.png') }}"
                                    alt="Vidoo case studies">
                            </div>
                            
                        </div>
                        <div class="content">
                            
                            <div class="testimonial-title mt-2">
                                <h3 class="title">تعزيز التواصل الثقافي والإقليمي</h3>
                            </div>
                            <div class="testimonial-description">
                                
                                <p>بفضل شبكة صُناع المحتوى لدينا من مختلف البلدان العربية، يمكنك الاستفادة من
                                    التنوع الثقافي والإقليمي لزيادة تأثير حملاتك. نحن نوفر لك محتوى
                                    يتناسب مع عادات وتقاليد جمهورك المستهدف في مصر، السعودية، والأردن.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a type="button" href="{{ route('login.form') }}" class="btn main-btn m-auto mt-3">جرب فيدوو الان </a>
    </section>

    <section class="my-5">
        <h1 class="text-center">دراسات حالة من فيدوو</h1>
        <p>على الرغم من أن فيدوو ما زالت في مراحلها الأولى، إلا
            أننا فخورون بما حققناه حتى الآن. فيدوو ليست مجرد منصة لربط صُناع
            المحتوى بالعلامات التجارية، بل هي أداة تمكّن الشركات من
            تحقيق نتائج مذهلة عبر التعاون مع المبدعين من جميع أنحاء
            المنطقة العربية. إليك كيف ساعدنا عملاءنا في تحقيق النجاح</p>
        <div class="row mt-4">

            <div class="col-md-4">
                <div class="post-wrapper my-4">
                    <div class="post-box">
                        <a href="#" class="post-link"></a>
                        <div class="post-image">
                            <img decoding="async" src="{{ asset('website/images/services/service4.png') }}"
                                data-orig-src="{{ asset('website/images/services/service4.png') }}"
                                class="image lazyloaded img-fluid" alt="Vidoo case studies">
                        </div>
                        
                        <div class="content-title">
                            <div class="title">

                                تعزيز التفاعل مع الجمهور المستهدف
                            </div>
                            
                        </div>
                        <div class="content-subtitle">
                            من خلال استخدام فيدوو، تمكّن العديد من العلامات التجارية من تحسين تفاعلها مع الجمهور عبر
                            إنشاء محتوى مبتكر وجذاب. بفضل الوصول إلى صُناع محتوى من مصر، السعودية، والأردن، تمكنا من
                            تقديم حلول تسويقية تلبي احتياجات كل علامة تجارية وفقًا لجمهورها المستهدف.
                        </div>
                        
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="post-wrapper my-4">
                    <div class="post-box">
                        <a href="#" class="post-link"></a>
                        <div class="post-image">
                            <img src="{{ asset('website/images/services/service5.png') }}"
                                class="image ls-is-cached lazyloaded img-fluid" alt="Vidoo case studies">
                        </div>
                        
                        <div class="content-title">
                            <div class="title">تحسين استراتيجيات التسويق بالفيديو</div>
                            
                        </div>
                        <div class="content-subtitle">
                            عبر منصتنا، ساعدنا الشركات في توجيه استراتيجياتها
                            التسويقية
                            نحو النجاح باستخدام أساليب مبتكرة للتواصل مع الجمهور.
                            من خلال التركيز على صُناع المحتوى الموهوبين، استطعنا تقديم
                            مقترحات لحملات تسويقية قوية، مما أدى إلى تحسين نتائج الأداء.

                        </div>
                        
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="post-wrapper my-4">
                    <div class="post-box">
                        <a href="#" class="post-link"></a>
                        <div class="post-image">
                            <img decoding="async" src="{{ asset('website/images/services/service6.png') }}"
                                data-orig-src="{{ asset('website/images/services/service6.png') }}"
                                class="image ls-is-cached lazyloaded img-fluid" alt="Vidoo case studies">
                        </div>
                        
                        <div class="content-title">
                            <div class="title">حلول تسويقية مخصصة</div>
                            
                        </div>
                        <div class="content-subtitle">
                            لكل علامة تجارية احتياجات فريدة، وفيدوو توفر الحلول المخصصة لكل مستخدم. نحن نعمل جنبًا
                            إلى جنب مع العلامات التجارية لتطوير استراتيجيات محتوى
                            تناسب احتياجاتهم الخاصة وتساعدهم على الوصول إلى جمهورهم المثالي.
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-5">
        <h1 class=text-center>لماذا يحبنا عملاؤنا؟</h1>
        

        <div class="row">
            <div class="col-md-4">
                <div class="testimonial-container-div">
                    <div class="testimonial-name-div">
                        <div class="img"><img class=" lazyloaded img-fluid" decoding="async"
                                src="{{ asset('website/images/brands/Ellipse-2.svg') }}"
                                data-orig-src="{{ asset('website/images/brands/Ellipse-2.svg') }}"
                                alt="Vidoo case studies"></div>
                        <div class="name">
                            <h5>تجربة مستخدم سلسة ومبتكرة</h5>
                            
                        </div>
                    </div>
                    <div class="testimonial-text-div">
                        <p>في Vidoo، نحن نفهم أهمية تجربة المستخدم،
                            لذلك قمنا بتصميم منصتنا لتكون
                            سهلة الاستخدام وسلسة. يمكن لعملائنا تصفح
                            المنصة والتفاعل مع صُناع المحتوى بكل سهولة،
                            مما يوفر وقتهم ويزيد من فعالية الحملات التسويقية.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-container-div">
                    <div class="testimonial-name-div">
                        <div class="img"><img class=" lazyloaded img-fluid" decoding="async"
                                src="{{ asset('website/images/brands/Ellipse-2-1.svg') }}"
                                data-orig-src="{{ asset('website/images/brands/Ellipse-2-1.svg') }}"
                                alt="Vidoo case studies"></div>
                        <div class="name">
                            <h5>ربط مباشر بين الشركات وصناع المحتوى</h5>
                            
                        </div>
                    </div>
                    <div class="testimonial-text-div">
                        <p>نتميز بقدرتنا على توصيل الشركات مباشرةً بصناع المحتوى
                            المناسبين دون الحاجة إلى وسطاء. هذا يقلل من
                            التكاليف ويعزز التواصل الفعّال،
                            مما يؤدي إلى نتائج أفضل في حملات التسويق.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-container-div">
                    <div class="testimonial-name-div">
                        <div class="img"><img class=" lazyloaded img-fluid" decoding="async"
                                src="{{ asset('website/images/brands/Ellipse-2-2.svg') }}"
                                data-orig-src="{{ asset('website/images/brands/Ellipse-2-2.svg') }}"
                                alt="Vidoo case studies"></div>
                        <div class="name">
                            <h5 class=" ">دعم عملاء ممتاز</h5>
                            
                        </div>
                    </div>
                    <div class="testimonial-text-div">
                        <p>فريق دعم العملاء لدينا متفاني في تقديم
                            أفضل خدمة ممكنة. نحن هنا لدعمك في كل خطوة على الطريق،
                            ونضمن أنك ستتلقى المساعدة التي تحتاجها بسرعة وكفاءة.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<section class="mt-5 border-bottom">
    <div class="bg-light p-5">
        <h1 class="text-center mb-4">
            ابدأ في إنشاء إعلانات فيديو ذات أداء عالٍ اليوم!
        </h1>

        <a type="button" href="{{ route('login.form') }}" class="btn main-btn m-auto">جرب فيدوو الان</a>
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
