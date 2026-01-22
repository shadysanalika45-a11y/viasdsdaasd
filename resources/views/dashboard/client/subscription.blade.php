@extends('layouts.app')

@section('title', 'إشتراكي')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">إشتراكي</h1>
        <p class="text-muted">راجع خطة الاشتراك الحالية والمزايا المتاحة.</p>

        <div class="row g-4">
            <div class="col-lg-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">الخطة الحالية</h5>
                        @if ($subscription)
                            <p class="mb-1">الخطة: <strong>{{ $subscription->plan->name ?? 'غير محددة' }}</strong></p>
                            <p class="mb-1">المدة: {{ $subscription->plan->interval === 'year' ? 'سنوي' : 'شهري' }}</p>
                            <p class="mb-1">الحالة: {{ $subscription->status }}</p>
                            <p class="mb-0">تاريخ الانتهاء: {{ optional($subscription->ends_at)->format('Y-m-d') }}</p>
                        @else
                            <p>لا يوجد اشتراك نشط حالياً.</p>
                        @endif
                        <a href="{{ route('pricing') }}" class="btn btn-outline-primary mt-3">تغيير الخطة</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">المزايا المتاحة</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">عدد فيديوهات مخصصة شهريًا حسب الخطة.</li>
                            <li class="list-group-item">الوصول إلى تقارير أداء الحملات.</li>
                            <li class="list-group-item">دعم مباشر للمشاريع المميزة.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">الباقات المتاحة</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>الخطة</th>
                                        <th>السعر</th>
                                        <th>المدة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($plans as $plan)
                                        <tr>
                                            <td>{{ $plan->name }}</td>
                                            <td>{{ $plan->price }}</td>
                                            <td>{{ $plan->interval === 'year' ? 'سنوي' : 'شهري' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">لا توجد باقات متاحة حالياً.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
