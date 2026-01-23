@extends('layouts.website')

@section('title', 'فيدوو - السوق الرائد لإنتاج إعلانات الفيديو في العالم العربي')

@section('content')
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
                        فيدوو يوفر لك الأدوات والفرص لتحقيق أهدافك والتعاون مع علامات تجارية وطنية ودولية. 
                    </p>
                    <a href="{{ route('login') }}" class="btn main-btn m-md-0 m-auto">
                        اطلب فيديو الآن!
                    </a>
                </div>
                <div class="social my-4">
                    <p>خبراء في :</p>
                    <div class="experts-in-img">
                        <img src="{{ asset('website/images/home/Meta_Platforms_Inc._logo-1.html') }}"
                            loading="lazy" class="img-fluid mx-2 cursor" />
                        <img src="{{ asset('website/images/home/TikTok_logo-1.html') }}" loading="lazy"
                            class="img-fluid mx-2 cursor" />
                        <img src="{{ asset('website/images/home/Linkedin-logo-home.png') }}" loading="lazy"
                            class="img-fluid mx-2 cursor" />
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid" src="{{ asset('website/images/home/home-gif.gif') }}" alt="" />
            </div>
        </div>
    </section>
</div>
@endsection
