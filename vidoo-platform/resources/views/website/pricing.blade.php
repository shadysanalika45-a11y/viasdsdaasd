@extends('layouts.website')

@section('title', 'الأسعار - فيدوو')

@section('content')
<div class="container my-5">
    <div class="text-center mb-5">
        <h1 class="mb-3">اختر الباقة المناسبة لك</h1>
        <p class="text-muted">باقات مرنة تناسب جميع احتياجاتك التسويقية</p>
    </div>

    @if(isset($packages) && $packages->count() > 0)
        <div class="row justify-content-center">
            @foreach($packages as $package)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 {{ $package->featured ? 'border-primary' : '' }}">
                        @if($package->featured)
                            <div class="card-header bg-primary text-white text-center">
                                <strong>الأكثر طلباً</strong>
                            </div>
                        @endif
                        <div class="card-body text-center">
                            <h3 class="card-title">{{ $package->name }}</h3>
                            <div class="my-4">
                                <h2 class="display-4">{{ $package->price }}</h2>
                                <small class="text-muted">{{ $package->currency->code }}</small>
                            </div>
                            <ul class="list-unstyled">
                                @if($package->features)
                                    @foreach(json_decode($package->features) as $feature)
                                        <li class="mb-2"><i class="bi bi-check-circle text-success"></i> {{ $feature }}</li>
                                    @endforeach
                                @endif
                            </ul>
                            <a href="{{ route('login') }}" class="btn btn-primary w-100 mt-4">اطلب الآن</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h3 class="card-title">الباقة الأساسية</h3>
                        <div class="my-4">
                            <h2 class="display-4">تواصل معنا</h2>
                        </div>
                        <p class="text-muted">للحصول على عرض سعر مخصص لاحتياجاتك</p>
                        <a href="{{ route('contact') }}" class="btn btn-primary w-100 mt-4">تواصل معنا</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="mt-5 text-center">
        <p class="text-muted">جميع الأسعار شاملة الضريبة</p>
        <p><a href="{{ route('package-policy') }}">سياسة الباقات</a> | <a href="{{ route('refund') }}">سياسة الاسترجاع</a></p>
    </div>
</div>
@endsection
