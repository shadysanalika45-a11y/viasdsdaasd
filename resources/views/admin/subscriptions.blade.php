@extends('layouts.app')

@section('title', 'إدارة الاشتراكات')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">إدارة الاشتراكات</h1>
        <p class="text-muted">إضافة أو تعديل خطط الاشتراك وإدارة مزايا كل خطة.</p>

        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">الاشتراكات النشطة</h5>
                        <p class="display-6">{{ $activeSubscriptions }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">إجمالي الاشتراكات</h5>
                        <p class="display-6">{{ $totalSubscriptions }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">خطط الاشتراك</h5>
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
                                    <td colspan="4" class="text-center">لا توجد خطط بعد.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('admin.plans.index') }}" class="btn btn-outline-primary mt-3">إدارة الخطط</a>
            </div>
        </div>
    </div>
@endsection
