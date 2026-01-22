@extends('layouts.app')

@section('title', 'لوحة العميل')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">مرحبًا {{ $user->name ?? 'عزيزي العميل' }}</h1>
        <p>هنا ستتمكن من إدارة طلباتك ومتابعة تقدم الفيديوهات التي طلبتها.</p>

        <div class="row g-4 mt-2">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">الطلبات النشطة</h5>
                        <p class="card-text">تابع آخر حالة للطلبات الجارية ومواعيد التسليم.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">الفواتير والاشتراك</h5>
                        <p class="card-text">استعرض خطط الاشتراك والفواتير المدفوعة.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">الدعم</h5>
                        <p class="card-text">تواصل مع فريق الدعم لأي استفسارات.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
