@extends('layouts.app')

@section('title', 'لوحة العميل')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">مرحبًا {{ $user->name }}</h1>
        <p class="text-muted">إدارة الاشتراكات، الفواتير، والحملات الإعلانية من مكان واحد.</p>
        <p class="fw-bold">الرصيد الحالي: {{ $balance?->amount ?? '0.00' }} {{ $balance?->currency ?? 'USD' }}</p>

        <div class="row g-4 mt-2">
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">الاشتراك الحالي</h5>
                        @if ($subscription)
                            <p class="mb-1">الخطة: <strong>{{ $subscription->plan->name ?? 'غير محددة' }}</strong></p>
                            <p class="mb-1">المدة: {{ $subscription->plan->interval === 'year' ? 'سنوي' : 'شهري' }}</p>
                            <p class="mb-1">الحالة: {{ $subscription->status }}</p>
                            <p class="mb-0">تاريخ الانتهاء: {{ optional($subscription->ends_at)->format('Y-m-d') }}</p>
                        @else
                            <p>لا يوجد اشتراك نشط حالياً.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">الباقات المتاحة</h5>
                        <ul class="list-group list-group-flush">
                            @forelse ($plans as $plan)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ $plan->name }}</span>
                                    <span>{{ $plan->price }} {{ $plan->interval === 'year' ? 'سنوي' : 'شهري' }}</span>
                                </li>
                            @empty
                                <li class="list-group-item">لا توجد باقات متاحة حالياً.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">الفواتير والمدفوعات الأخيرة</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>المرجع</th>
                                        <th>المبلغ</th>
                                        <th>الحالة</th>
                                        <th>التاريخ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($payments as $payment)
                                        <tr>
                                            <td>{{ $payment->reference ?? '-' }}</td>
                                            <td>{{ $payment->amount }}</td>
                                            <td>{{ $payment->status }}</td>
                                            <td>{{ $payment->created_at?->format('Y-m-d') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">لا توجد مدفوعات بعد.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">إحصائيات الأداء</h5>
                        <p>متابعة التفاعل، المشاهدات، وعدد الحملات النشطة.</p>
                        <ul class="list-unstyled">
                            <li>الحملات النشطة: 0</li>
                            <li>المشاهدات هذا الشهر: 0</li>
                            <li>معدل التحويل: 0%</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">التواصل مع صُنّاع المحتوى</h5>
                        <p>ابدأ مشروعًا جديدًا وأرسل متطلبات الحملة لمبدعين مناسبين.</p>
                        <a href="{{ route('creators') }}" class="btn btn-outline-primary">استعرض المبدعين</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">إعدادات الحساب</h5>
                        <p>حدّث بياناتك الشخصية أو غيّر كلمة المرور.</p>
                        <a href="{{ route('profile') }}" class="btn btn-outline-secondary">الذهاب للإعدادات</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">رصيد الحساب</h5>
                        <p>إضافة رصيد أو متابعة العمليات الأخيرة.</p>
                        <a href="{{ route('client.balance') }}" class="btn btn-outline-primary">إدارة الرصيد</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
