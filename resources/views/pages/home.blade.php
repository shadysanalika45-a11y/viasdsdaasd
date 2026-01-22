@extends('layouts.app')
@section('title', 'فيدوو - السوق الرائد لإنتاج إعلانات الفيديو في العالم العربي')
@section('body_class', 'horizontal-layout horizontal-menu footer-static')

@section('meta')
    <meta name="description" content="انضم إلى فيدوو، المنصة التي تربط العلامات التجارية بصُناع المحتوى العرب لإنتاج فيديوهات أصيلة تعزز تفاعل جمهورك وتعكس هوية علامتك التجارية.">
    <meta name="keywords" content="انضم إلى فيدوو، المنصة التي تربط العلامات التجارية بصُناع المحتوى العرب لإنتاج فيديوهات أصيلة تعزز تفاعل جمهورك وتعكس هوية علامتك التجارية.">
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('website/lib/boostrap5.0.2/bootstrap.rtl.min.css') }}">
    <link href="{{ asset('website/lib/font/Messiri.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/btns.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/home.css') }}">
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
    <script type="text/javascript" class="flasher-js">(function() {    var rootScript = '../cdn.jsdelivr.net/npm/%40flasher/flasher%401.3.2/dist/flasher.min.js';    var FLASHER_FLASH_BAG_PLACE_HOLDER = {};    var options = mergeOptions([], FLASHER_FLASH_BAG_PLACE_HOLDER);    function mergeOptions(first, second) {        return {            context: merge(first.context || {}, second.context || {}),            envelopes: merge(first.envelopes || [], second.envelopes || []),            options: merge(first.options || {}, second.options || {}),            scripts: merge(first.scripts || [], second.scripts || []),            styles: merge(first.styles || [], second.styles || []),        };    }    function merge(first, second) {        if (Array.isArray(first) && Array.isArray(second)) {            return first.concat(second).filter(function(item, index, array) {                return array.indexOf(item) === index;            });        }        return Object.assign({}, first, second);    }    function renderOptions(options) {        if(!window.hasOwnProperty('flasher')) {            console.error('Flasher is not loaded');            return;        }        requestAnimationFrame(function () {            window.flasher.render(options);        });    }    function render(options) {        if ('loading' !== document.readyState) {            renderOptions(options);            return;        }        document.addEventListener('DOMContentLoaded', function() {            renderOptions(options);        });    }    if (1 === document.querySelectorAll('script.flasher-js').length) {        document.addEventListener('flasher:render', function (event) {            render(event.detail);        });            }    if (window.hasOwnProperty('flasher') || !rootScript || document.querySelector('script[src="' + rootScript + '"]')) {        render(options);    } else {        var tag = document.createElement('script');        tag.setAttribute('src', rootScript);        tag.setAttribute('type', 'text/javascript');        tag.onload = function () {            render(options);        };        document.head.appendChild(tag);    }})();</script>
@endpush

@section('content')
<!-- Google Tag Manager -->

<!-- End Google Tag Manager -->
        <!-- BEGIN: Main Menu-->
        
        <!-- END: Main Menu-->


            <div class="container">
        <section class="my-5">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="text-md-start text-center mb-2">
                        <h1>

                            إكتشف مزايا
                            <span class="authentic-creator">فيدوو</span>
                            وابدأ رحلة الإبداع

                        </h1>
                        <p>فيدوو هو منصة عربية تربط الشركات بصُناع المحتوى
        والمبدعين العرب، ويقدم لك كل ما تحتاجه لتحويل أفكارك
        إلى واقع. سواء كنت شركة تبحث عن محتوى مميز أو صانع محتوى يطمح لتطوير مهاراته،
        فيدوو يوفر لك الأدوات والفرص لتحقيق أهدافك والتعاون مع علامات تجارية وطنية ودولية. </p>
                        <a type="button" href="{{ route('login.form') }}" class="btn main-btn m-md-0 m-auto">
                            اطلب فيديو الآن!
                        </a>
                    </div>
                    <div class="social my-4">
                        <p>خبراء في :</p>
                        <div class="experts-in-img">
                            <a href="#">

                                <img src="{{ asset('website/images/home/Meta_Platforms_Inc._logo-1.html') }}"
                                    loading="lazy" class="img-fluid mx-2 cursor" />
                            </a>
                            <a href="#">
                                <img src="{{ asset('website/images/home/TikTok_logo-1.html') }}" loading="lazy"
                                    class="img-fluid mx-2 cursor" />
                            </a>
                            <a href="https://www.linkedin.com/company/vidoo-app/" target="blank">

                                <img src="{{ asset('website/images/home/Linkedin-logo-home.png') }}" loading="lazy"
                                    class="img-fluid mx-2 cursor" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">

                    <img class="img-fluid" src="{{ asset('website/images/home/home-gif.gif') }}" alt=""
                        srcset="" />



                </div>
            </div>

        </section>

        <section class="my-5">
            <h3 class="text-center">احصل على محتوى المبدعين فورًا وبكل سهولة ويسر.</h3>
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="six-box-div">
                        <img src="{{ asset('website/images/home/1.png') }}" alt="" srcset="" />
                        <h5 class="mt-4">اكتشف أفضل المواهب مع فيدوو </h5>
                        <p>اختر من بين أبرز المبدعين على فيدوو، وابدأ رحلتك نحو إنشاء محتوى يُميزك في السوق.</p>
                        <p>اطلب مُساعدة فيدوو في البحث عن صُناع المحتوى المُناسبين لِمشروعك.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="six-box-div">
                        <img src="{{ asset('website/images/home/2.png') }}" alt="" srcset="" />
                        <h5 class="mt-4">عزز حضورك الرقمي مع فيدوو</h5>
                        <p>شارك محتواك مع العالم وواصل الوصول إلى جمهور جديد ومستهدف من خلال فيدوو.</p>
                        <p>استفد من خصائص فيدوو لنشر محتواك عبر مختلف المنصات الاجتماعية والوصول إلى جمهور أوسع.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="six-box-div">
                        <img src="{{ asset('website/images/home/3.png') }}" alt="" srcset="" />
                        <h5 class="mt-4">تحسين حضورك الرقمي</h5>
                        <p>بمساعدة فيدوو، حول أفكارك إلى محتوى بصري يُعزز من تواجدك الرقمي بفعالية.</p>
                        <p>اطلب مُساعدة فيدوو في التخطيط لِحملة إعلانية فعّالة على المنصات الاجتماعية.</p>
                    </div>
                </div>

            </div>

            <a type="button" href="{{ route('login.form') }}"
                class="btn main-btn mt-5 m-auto">اطلب فيديو الآن! </a>
        </section>

        <section class="my-5">
            <h3 class="text-center">للمبدعين في مجال المحتوى</h3>

            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="case-study-box">
                        <a href="#">
                            <img class="lazyloaded img-fluid" decoding="async"
                                src="{{ asset('website/images/home/4.png') }}"
                                data-orig-src="{{ asset('website/images/home/4.png') }}"
                                alt="vidoo.app | Best UGC Videos Platform" />
                        </a>

                        <h4 data-fontsize="26" style="--fontSize: 26; line-height: 1.23" data-lineheight="31.98px">
                            عرض إبداعاتك و أعمالك
                        </h4>

                        <p>شارك محتواك مع العالم و أظهر مهاراتك لِشركات و أفراد يبحثون عن محتوى مميز.</p>

                        <p>اطلب مُساعدة فيدوو في تُعزيز حضورك على المنصة و اِتصل بِالجمهور المُناسب.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="case-study-box">
                        <a href="#">
                            <img class="lazyloaded img-fluid" decoding="async"
                                src="{{ asset('website/images/home/5.png') }}"
                                data-orig-src="{{ asset('website/images/home/5.png') }}"
                                alt="vidoo.app | Best UGC Videos Platform" />
                        </a>

                        <h4 data-fontsize="26" style="--fontSize: 26; line-height: 1.23" data-lineheight="31.98px"
                            class=" ">

                            اكتشف فرص جديدة لِكسب الدخل
                        </h4>
                        <p>اعثر على مشاريع جديدة و فرص لِكسب الدخل من خلال فيدوو.</p>
                        <p>اِستفد من نظام فيدوو الذي يُسهّل التواصل بين الشركات و صُناع المحتوى.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="case-study-box">
                        <a href="#">
                            <img class="lazyloaded img-fluid" decoding="async"
                                src="{{ asset('website/images/home/6.png') }}"
                                data-orig-src="{{ asset('website/images/home/6.png') }}"
                                alt="vidoo.app | Best UGC Videos Platform" />
                        </a>

                        <h4 data-fontsize="26" style="--fontSize: 26; line-height: 1.23" data-lineheight="31.98px"
                            class=" ">

                            كن جزءاً من مجتمع مُفعم بالإبداع
                        </h4>

                        <p>انضم إلى مجتمع فيدوو المُفعّم بالإبداع و شارك محتواك مع صُناع المحتوى الآخرين. </p>
                        <p>تعاون مع صُناع المحتوى الآخرين و تبادل الخبرات و المهارات.</p>

                    </div>
                </div>
            </div>
        </section>

        <section class="my-5">

            <h3 class="text-center">
                اكتشف وجوه حقيقية لأي مجال

            </h3>

            <div class="row mt-5">
                <div class="col-lg-6">
                    <div class="text-md-start text-center mb-2">
                        <h5>
                            اختر من بين صُناع المحتوى في الوطن العربي الذين تم اختيارهم بدقة
                        </h5>
                        <p>استفد من شبكة واسعة من صُناع المحتوى المقيمين في
        الوطن العربي، والذين تم اختيارهم لجودتهم الاستثنائية. استكشف مجموعة متنوعة من
        الفئات الديموغرافية والأنماط والمجالات للعثور على المطابقة المثالية لعلامتك التجارية.
        عزز ظهورك على تيك توك وميتا من خلال التعاون مع صُناع محتوى متميزين يمكنهم جعل علامتك تبرز.</p>

                        <div class="discover-box-with-icons">
                            <div class="discover-box">
                                <div class="discover-box-left">
                                    <img class=" ls-is-cached lazyloaded" decoding="async"
                                        src="{{ asset('website/images/home/icon-star.svg') }}"
                                        data-orig-src="{{ asset('website/images/home/icon-star.svg') }}"
                                        alt="vidoo.app | Best UGC Videos Platform">
                                </div>
                                <div class="discover-box-right">
                                    <h5 data-fontsize="21" style="--fontSize: 21; line-height: 1.24;"
                                        data-lineheight="26px" class=" ">4.95/5
                                    </h5>
                                    <p>معدل تقييم المستخدمين</p>
                                </div>
                            </div>
                            <div class="discover-box">
                                <div class="discover-box-left">
                                    <img class=" ls-is-cached lazyloaded" decoding="async"
                                        src="{{ asset('website/images/home/icon-users.svg') }}"
                                        data-orig-src="{{ asset('website/images/home/icon-users.svg') }}"
                                        alt="vidoo.app | Best UGC Videos Platform">
                                </div>
                                <div class="discover-box-right">
                                    <h5 data-fontsize="21" style="--fontSize: 21; line-height: 1.24;"
                                        data-lineheight="26px" class=" ">18-70
                                    </h5>
                                    <p>أعمار صناع المحتوى تتراوح بين</p>
                                </div>
                            </div>
                        </div>
                        <a type="button" href="{{ route('pricing') }}"
                            class="btn sec-button m-auto">عرض الاسعار </a>
                    </div>

                </div>
                <div class="col-lg-6">

                    <img class="img-fluid" src="{{ asset('website/images/home/home-gif.gif') }}" alt=""
                        srcset="" />

                    

                </div>
            </div>

        </section>

        <section class="my-5">
            <h3>منصة موحدة، بعملية سهلة</h3>

            <p>يمكنك طلب فيديوهات من المبدعين عبر 4 خطوات بسيطة:</p>

            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="four-step-box">
                        <div class="four-step-box-left">
                            <p>1.</p>
                        </div>
                        <div class="four-step-box-right">
                            <h5 data-fontsize="21" style="--fontSize: 21; line-height: 1.24" data-lineheight="26px"
                                class=" ">
                                حدد احتياجاتك

                            </h5>
                            <p>اختر بين إعلانات الفيديو لمحتوى المستخدم أو المحتوى العضوي، حدد تفاصيل الفيديو، وقرر عددالفيديوهات التي ترغب في طلبها.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="four-step-box">
                        <div class="four-step-box-left">
                            <p>2.</p>
                        </div>
                        <div class="four-step-box-right">
                            <h5 data-fontsize="21" style="--fontSize: 21; line-height: 1.24" data-lineheight="26px"
                                class=" ">
                                صمم توجيهات الفيديو الخاصة بك
                            </h5>
                            <p>حدد عدد التنويعات، اختر المنتج الذي تريد الترويج له، وصمم الهيكل الخاص بتوجيهاتك.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="four-step-box">
                        <div class="four-step-box-left">
                            <p>3.</p>
                        </div>
                        <div class="four-step-box-right">
                            <h5 data-fontsize="21" style="--fontSize: 21; line-height: 1.24" data-lineheight="26px"
                                class=" ">
                                اعثر على المبدعين المناسبين
                            </h5>
                            <p>ابحث عن المبدعين بناءً على الديموغرافيا والاهتمامات والأنماط لتجد أفضل تطابق لعلامتك التجارية ومنتجاتك.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="four-step-box">
                        <div class="four-step-box-left">
                            <p>4.</p>
                        </div>
                        <div class="four-step-box-right">
                            <h5 data-fontsize="21" style="--fontSize: 21; line-height: 1.24" data-lineheight="26px"
                                class=" ">
                                استلم فيديوهات UGC متميزة
                            </h5>
                            <p>اختر من المبدعين المهتمين، أرسل منتجاتك إذا شئت، وانتظر وصول فيديوهاتك عالية الجودة.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="my-5">
            <h3 class="text-center">لماذا تختار فيدوو؟</h3>
            <p class="text-center">
                لأن النجاح يبدأ بمحتوى مُتميز! استفد من فيديوهات فيدوو عالية الأداء لتعزيز علامتك التجارية.
            </p>
            <div class="mt-5">
                <div class="table-responsive">
                    <table class="table table-striped table-vidoo">
                        <thead class="thead-vidoo">
                            <tr class="vidoo-compare-tr-head">
                                <th class="vidoo-first-th-width"></th>
                                <th class="background-for-vidoo-in-table all-next-vidoo-width">

                                    <img src="{{ asset('users-asset/images/logo/arabic-logo.png') }}" alt="logo"
                                        class="vidoo_logo img-fluid" height="50" width="100">
                                </th>
                                <th class="all-next-vidoo-width">المؤثرين</th>
                                <th class="all-next-vidoo-width">شركات الانتاج</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="vidoo-compare-tr-body">
                                <td class="all-next-vidoo-width">التكلفة الفعالة</td>
                                <td class="all-next-vidoo-width">
                                    <img class="ls-is-cached lazyloaded" decoding="async"
                                        src="{{ asset('website/images/svg/Check-circle-filled.svg') }}"
                                        data-orig-src="{{ asset('website/images/svg/Check-circle-filled.svg') }}"
                                        alt="vidoo.app | Best UGC Videos Platform" />
                                </td>

                                <td class="all-next-vidoo-width">
                                    <img class="ls-is-cached lazyloaded" decoding="async"
                                        src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        data-orig-src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        alt="vidoo.app | Best UGC Videos Platform" />
                                </td>

                                <td class="all-next-vidoo-width">
                                    <img class="ls-is-cached lazyloaded" decoding="async"
                                        src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        data-orig-src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        alt="vidoo.app | Best UGC Videos Platform" />
                                </td>
                            </tr>

                            <tr class="vidoo-compare-tr-body">
                                <td class="all-next-vidoo-width">السرعة</td>
                                <td class="all-next-vidoo-width">
                                    <img class="ls-is-cached lazyloaded" decoding="async"
                                        src="{{ asset('website/images/svg/Check-circle-filled.svg') }}"
                                        data-orig-src="{{ asset('website/images/svg/Check-circle-filled.svg') }}"
                                        alt="vidoo.app | Best UGC Videos Platform" />
                                </td>

                                <td class="all-next-vidoo-width">
                                    <img class="ls-is-cached lazyloaded" decoding="async"
                                        src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        data-orig-src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        alt="vidoo.app | Best UGC Videos Platform" />
                                </td>

                                <td class="all-next-vidoo-width">
                                    <img class="ls-is-cached lazyloaded" decoding="async"
                                        src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        data-orig-src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        alt="vidoo.app | Best UGC Videos Platform" />
                                </td>
                            </tr>
                            <tr class="vidoo-compare-tr-body">
                                <td class="all-next-vidoo-width"> السهولة</td>
                                <td class="all-next-vidoo-width">
                                    <img class="ls-is-cached lazyloaded" decoding="async"
                                        src="{{ asset('website/images/svg/Check-circle-filled.svg') }}"
                                        data-orig-src="{{ asset('website/images/svg/Check-circle-filled.svg') }}"
                                        alt="vidoo.app | Best UGC Videos Platform" />
                                </td>

                                <td class="all-next-vidoo-width">
                                    <img class="ls-is-cached lazyloaded" decoding="async"
                                        src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        data-orig-src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        alt="vidoo.app | Best UGC Videos Platform" />
                                </td>

                                <td class="all-next-vidoo-width">
                                    <img class="ls-is-cached lazyloaded" decoding="async"
                                        src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        data-orig-src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        alt="vidoo.app | Best UGC Videos Platform" />
                                </td>
                            </tr>
                            <tr class="vidoo-compare-tr-body">
                                <td class="all-next-vidoo-width"> التخصيص</td>
                                <td class="all-next-vidoo-width">
                                    <img class="ls-is-cached lazyloaded" decoding="async"
                                        src="{{ asset('website/images/svg/Check-circle-filled.svg') }}"
                                        data-orig-src="{{ asset('website/images/svg/Check-circle-filled.svg') }}"
                                        alt="vidoo.app | Best UGC Videos Platform" />
                                </td>

                                <td class="all-next-vidoo-width">
                                    <img class="ls-is-cached lazyloaded" decoding="async"
                                        src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        data-orig-src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        alt="vidoo.app | Best UGC Videos Platform" />
                                </td>

                                <td class="all-next-vidoo-width">
                                    <img class="ls-is-cached lazyloaded" decoding="async"
                                        src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        data-orig-src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        alt="vidoo.app | Best UGC Videos Platform" />
                                </td>
                            </tr>
                            <tr class="vidoo-compare-tr-body">
                                <td class="all-next-vidoo-width"> القابلية للتوسع</td>
                                <td class="all-next-vidoo-width">
                                    <img class="ls-is-cached lazyloaded" decoding="async"
                                        src="{{ asset('website/images/svg/Check-circle-filled.svg') }}"
                                        data-orig-src="{{ asset('website/images/svg/Check-circle-filled.svg') }}"
                                        alt="vidoo.app | Best UGC Videos Platform" />
                                </td>

                                <td class="all-next-vidoo-width">
                                    <img class="ls-is-cached lazyloaded" decoding="async"
                                        src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        data-orig-src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        alt="vidoo.app | Best UGC Videos Platform" />
                                </td>

                                <td class="all-next-vidoo-width">
                                    <img class="ls-is-cached lazyloaded" decoding="async"
                                        src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        data-orig-src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        alt="vidoo.app | Best UGC Videos Platform" />
                                </td>
                            </tr>
                            <tr class="vidoo-compare-tr-body">
                                <td class="all-next-vidoo-width"> الأصالة</td>
                                <td class="all-next-vidoo-width">
                                    <img class="ls-is-cached lazyloaded" decoding="async"
                                        src="{{ asset('website/images/svg/Check-circle-filled.svg') }}"
                                        data-orig-src="{{ asset('website/images/svg/Check-circle-filled.svg') }}"
                                        alt="vidoo.app | Best UGC Videos Platform" />
                                </td>

                                <td class="all-next-vidoo-width">
                                    <img class="ls-is-cached lazyloaded" decoding="async"
                                        src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        data-orig-src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        alt="vidoo.app | Best UGC Videos Platform" />
                                </td>

                                <td class="all-next-vidoo-width">
                                    <img class="ls-is-cached lazyloaded" decoding="async"
                                        src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        data-orig-src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        alt="vidoo.app | Best UGC Videos Platform" />
                                </td>
                            </tr>
                            <tr class="vidoo-compare-tr-body">
                                <td class="all-next-vidoo-width">جاهزية الإطلاق</td>
                                <td class="all-next-vidoo-width">
                                    <img class="ls-is-cached lazyloaded" decoding="async"
                                        src="{{ asset('website/images/svg/Check-circle-filled.svg') }}"
                                        data-orig-src="{{ asset('website/images/svg/Check-circle-filled.svg') }}"
                                        alt="vidoo.app | Best UGC Videos Platform" />
                                </td>

                                <td class="all-next-vidoo-width">
                                    <img class="ls-is-cached lazyloaded" decoding="async"
                                        src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        data-orig-src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        alt="vidoo.app | Best UGC Videos Platform" />
                                </td>

                                <td class="all-next-vidoo-width">
                                    <img class="ls-is-cached lazyloaded" decoding="async"
                                        src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        data-orig-src="{{ asset('website/images/svg/Close_round.svg') }}"
                                        alt="vidoo.app | Best UGC Videos Platform" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section class="my-5">

            <div class="info-section d-md-grid my-4">
                <div class="cta-div-left">
                    <img class=" lazyloaded" decoding="async" height="500px"
                        src="{{ asset('users-asset/images/vidoo-chat-img-2.png') }}"
                        data-orig-src="{{ asset('users-asset/images/vidoo-chat-img-2.png') }}"
                        alt="vidoo.app | Best UGC Videos Platform">
                </div>
                <div class="cta-div-right">
                    <h3>ارتقِ بعلامتك التجارية مع
                        <span class="main-text fw-bold">فيدوو</span>
                    </h3>
                    <p>اجذب جمهورك بمقاطع فيديو استثنائية يصنعها صُناع محتوى فيدوو خصيصًا
            لوسائل التواصل المدفوعة. لا تقتصر فقط على الإعلان، بل دع أصوات العملاء
             الحقيقية تبني الثقة، تعزز مجتمعك، وتؤسس لعلاقات طويلة الأمد مع عملائك.
            اكتشف قوة استراتيجيات إعلاناتنا الفعّالة اليوم، وشاهد كيف يتحول أداؤك غدًا.

                    </p>
                    <p class="fw-bold">✨ أنت على بُعد خطوة واحدة من إحداث تغيير كبير!</p>
                    <p>📩 تواصل معنا الآن وابدأ رحلتك نحو النجاح!</p>

                    <a type="button" href="{{ route('contact') }}" class="button-black m-md-0 m-auto">
                        تواصل معنا !</a>
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
    <script>
        // var swiper = new Swiper('.swiper-videos', {
        //     slidesPerView: 2,
        //     spaceBetween: 2,
        //     loop: true,
        //     autoplay: {
        //         delay: 2500,
        //         disableOnInteraction: false,
        //     },
        //     speed: 2000,
        //     pagination: {
        //         el: '.swiper-pagination-vedios',
        //         clickable: true,
        //     },
        //     focusOnSelect: true
        // });

        // $(document).ready(function() {

        //     $().ready(function() {
        //         tt = $('.slick-carousel').slick({
        //             // arrows: true,
        //             centerPadding: "42px",
        //             infinite: true,
        //             speed: 300,
        //             slidesToShow: 2,
        //             slidesToScroll: 1,
        //             autoplay: true,
        //             autoplaySpeed: 2000,
        //             arrows: true,
        //             centerMode: true,
        //             // focusOnSelect: true,
        //             // activeOnSelect:true

        //             responsive: [{
        //                     breakpoint: 1024,
        //                     settings: {
        //                         slidesToShow: 1,
        //                         slidesToScroll: 1
        //                     }
        //                 },
        //                 {
        //                     breakpoint: 600,
        //                     settings: {
        //                         slidesToShow: 2,
        //                         slidesToScroll: 1
        //                     }
        //                 },
        //                 {
        //                     breakpoint: 480,
        //                     settings: {
        //                         slidesToShow: 1,
        //                         slidesToScroll: 1,
        //                         centerMode: true,
        //                         infinite: true,


        //                     }
        //                 }

        //             ]
        //         });
        //     });
        // });
    </script>
@endpush
