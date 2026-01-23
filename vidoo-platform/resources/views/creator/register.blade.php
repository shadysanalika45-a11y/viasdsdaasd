<!DOCTYPE html>
<html class="loading" lang="ar" data-textdirection="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب صانع محتوى - فيدوو</title>
    
    <link rel="stylesheet" type="text/css" href="{{ asset('users-asset/vendors/css/vendors-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('users-asset/css-rtl/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('users-asset/css-rtl/pages/authentication.css') }}">
    <link href="{{ asset('website/lib/font/Messiri.css') }}" rel="stylesheet">
</head>
<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static">
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="{{ route('home') }}" class="brand-logo">
                                    <img src="{{ asset('users-asset/images/logo/logo-2.png') }}" width="150px">
                                </a>

                                <h4 class="card-title mb-1 fw-bolder">انضم إلى مجتمع فيدوو وابدأ رحلتك الإبداعية!</h4>
                                <p class="card-text">سجّل الآن للوصول إلى فرص التعاون مع علامات تجارية رائدة</p>

                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                            <p class="mb-0">{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif

                                <form action="{{ route('creator.register') }}" method="POST">
                                    @csrf
                                    <div class="mb-1">
                                        <label for="name" class="form-label">الاسم</label>
                                        <input type="text" class="form-control" id="name" name="name" 
                                            value="{{ old('name') }}" required />
                                    </div>

                                    <div class="mb-1">
                                        <label for="phone" class="form-label">رقم الجوال</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" 
                                            value="{{ old('phone') }}" required />
                                    </div>

                                    <div class="mb-1">
                                        <label for="email" class="form-label">البريد الإلكتروني</label>
                                        <input type="email" class="form-control" id="email" name="email" 
                                            value="{{ old('email') }}" required />
                                    </div>

                                    <div class="mb-1">
                                        <label for="country_id" class="form-label">الدولة</label>
                                        <select class="form-select" id="country_id" name="country_id" required>
                                            <option value="">اختر من فضلك</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-1">
                                            <label for="gender" class="form-label">الجنس</label>
                                            <select class="form-select" id="gender" name="gender">
                                                <option value="">اختر من فضلك</option>
                                                <option value="ذكر">ذكر</option>
                                                <option value="أنثى">أنثى</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <label for="birthdate" class="form-label">تاريخ الميلاد</label>
                                            <input type="date" class="form-control" id="birthdate" name="birthdate" 
                                                value="{{ old('birthdate') }}">
                                        </div>
                                    </div>

                                    <div class="mb-1">
                                        <label for="password" class="form-label">كلمة المرور</label>
                                        <input type="password" class="form-control" id="password" name="password" required />
                                    </div>

                                    <div class="mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="agree" name="agree" required />
                                            <label class="form-check-label" for="agree">
                                                أوافق على <a href="{{ route('policy') }}">سياسة الخصوصية والشروط والأحكام</a>
                                            </label>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary w-100" type="submit">سجّل الآن</button>
                                </form>

                                <p class="text-center mt-1">
                                    <span>هل لديك حساب بالفعل؟</span>
                                    <a href="{{ route('login') }}">
                                        <span>سجّل الدخول بدلاً من ذلك</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('users-asset/vendors/js/vendors.min.js') }}"></script>
</body>
</html>
