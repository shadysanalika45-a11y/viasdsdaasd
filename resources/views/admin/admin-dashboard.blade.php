@extends('layouts.app')

@section('title', 'لوحة الإدارة')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-4">لوحة الإدارة</h1>

        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">إجمالي المستخدمين</h5>
                        <p class="display-6">{{ $users }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">إجمالي الاشتراكات</h5>
                        <p class="display-6">{{ $subscriptions }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">الباقات النشطة</h5>
                        <p class="display-6">{{ $plans->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">إجمالي الرصيد المضاف</h5>
                        <p class="display-6">{{ $totalBalance }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">إجمالي نقاط الفيديو</h5>
                        <p class="display-6">{{ $totalPoints }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">إدارة الباقات</h5>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>الخطة</th>
                                <th>السعر</th>
                                <th>المدة</th>
                                <th>الحالة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($plans as $plan)
                                <tr>
                                    <td>{{ $plan->name }}</td>
                                    <td>{{ $plan->price }}</td>
                                    <td>{{ $plan->interval === 'year' ? 'سنوي' : 'شهري' }}</td>
                                    <td>{{ $plan->is_active ? 'نشطة' : 'غير نشطة' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">لا توجد باقات مضافة بعد.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('admin.video.points') }}" class="btn btn-outline-primary mt-3">
                    إعدادات نقاط الفيديو
                </a>
                <a href="{{ route('admin.plans.index') }}" class="btn btn-outline-secondary mt-3 ms-2">
                    إدارة الباقات
                </a>
                <a href="{{ route('admin.reports') }}" class="btn btn-outline-success mt-3 ms-2">
                    التقارير الحية
                </a>
            </div>
        </div>
    </div>
@endsection
