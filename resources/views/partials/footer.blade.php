<footer>
    <div class="footer-container">
        <div class="footer-column">
            <h4>روابط سريعة</h4>
            <ul>
                <li><a href="{{ route('home') }}">الصفحة الرئيسية</a></li>
                <li><a href="{{ route('ecommerce') }}">التجارة الالكترونية</a></li>
                <li><a href="{{ route('agencies') }}">الوكالات</a></li>
                <li><a href="{{ route('brands') }}">العلامات التجارية</a></li>
                <li><a href="{{ route('pricing') }}">الأسعار</a></li>
                <li><a href="{{ route('creator.register') }}">إنضم لمبدعي فيدوو</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h4>التواصل الاجتماعي</h4>
            <ul>
                <li><a href="https://www.facebook.com/VidooA" target="_blank" rel="noopener">فيس بوك</a></li>
                <li><a href="https://www.instagram.com/vidoo_app/" target="_blank" rel="noopener">انستجرام</a></li>
                <li><a href="https://www.linkedin.com/company/vidoo-app/" target="_blank" rel="noopener">لينكد ان</a></li>
                <li><a href="https://www.youtube.com/@VidooApp" target="_blank" rel="noopener">يوتيوب</a></li>
                <li><a href="https://wa.me/+966501109290" target="_blank" rel="noopener">واتساب</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h4>السياسات والتعليمات</h4>
            <ul>
                <li><a href="{{ route('conditions') }}">شروط الخدمة</a></li>
                <li><a href="{{ route('policy') }}">سياسة الخصوصية</a></li>
                <li><a href="{{ route('refund') }}">سياسة استرداد الامول</a></li>
                <li><a href="{{ route('package.policy') }}">سياسة انتهاء صلاحية الِحزم</a></li>
                <li><a href="https://blog.vidoo.app/" target="_blank" rel="noopener">المدونة</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h4>تواصل معنا </h4>
            <p class="main-text"><a href="https://wa.me/+966501109290" class="main-text">966501109290+</a></p>
            <p><a href="mailto:hello@vidoo.app" class="main-text">hello@vidoo.app</a></p>
        </div>
        <div class="footer-column large-column">
            <div class="pl-3 pr-3">
                <img src="{{ asset('users-asset/images/logo/arabic-logo.png') }}" height="50" width="100"
                    class="vidoo_logo img-fluid" alt="vidoo.app">
                <p>تواصل مع أبرز المبدعين العرب في مجالك، حيث الجودة والإبداع يجتمعان في حملاتك التسويقية على منصات TikTok
                    وMeta</p>
            </div>
        </div>
    </div>
    <div class="footer-container d-block">
        <hr class="footer-hr">
        <div class="d-md-flex justify-content-between align-items-center ">
            <div class="my-2 ">
                <div class="Copyright">
                    جميع الحقوق محفوظة © 2024 لشركة فيدوو.
                </div>
            </div>
            <div class="my-2">
                <div class="social-links d-flex gap-4">
                    <a href="https://wa.me/+966501109290" target="_blank" rel="noopener">
                        <img class="lazyloaded" decoding="async" src="{{ asset('website/images/general/whatsapp-24.svg') }}"
                            data-orig-src="{{ asset('website/images/general/whatsapp-24.svg') }}"
                            alt="vidoo.app | Best UGC Videos Platform">
                    </a>
                    <a href="https://www.facebook.com/VidooA" target="_blank" rel="noopener">
                        <img class="lazyloaded" decoding="async" src="{{ asset('website/images/general/Facebook-24.svg') }}"
                            data-orig-src="{{ asset('website/images/general/whatsapp-24.svg') }}"
                            alt="vidoo.app | Best UGC Videos Platform">
                    </a>
                    <a href="https://www.instagram.com/vidoo_app/" target="_blank" rel="noopener">
                        <img class="lazyloaded" decoding="async"
                            src="{{ asset('website/images/general/Instagram-24.svg') }}"
                            data-orig-src="{{ asset('website/images/general/Instagram-24.svg') }}"
                            alt="vidoo.app | Best UGC Videos Platform">
                    </a>
                    <a href="https://www.linkedin.com/company/vidoo-app/?" target="_blank" rel="noopener">
                        <img class="lazyloaded" decoding="async" src="{{ asset('website/images/general/LinkedIn-24.svg') }}"
                            data-orig-src="{{ asset('website/images/general/LinkedIn-24.svg') }}" target="_blank"
                            alt="vidoo.app | Best UGC Videos Platform">
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
