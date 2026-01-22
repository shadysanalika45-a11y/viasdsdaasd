@extends('layouts.app')

@section('title', 'إدارة المدفوعات')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">إدارة المدفوعات</h1>
        <p class="text-muted">متابعة المدفوعات عبر Stripe أو PayPal وإدارة التأكيد عبر البريد الإلكتروني أو OTP.</p>

        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">إجمالي المدفوعات</h5>
                        <p class="display-6">{{ $totalBalance }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">المدفوعات اليدوية</h5>
                        <p class="text-muted">راجع الإثباتات ووافق عليها أو ارفضها.</p>
                        <a href="{{ route('admin.manual-payments.index') }}" class="btn btn-outline-primary">عرض المدفوعات اليدوية</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">آخر العمليات</h5>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>المرجع</th>
                                <th>المبلغ</th>
                                <th>النوع</th>
                                <th>التاريخ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($recentTransactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->reference ?? '-' }}</td>
                                    <td>{{ $transaction->amount }}</td>
                                    <td>{{ $transaction->type }}</td>
                                    <td>{{ $transaction->created_at?->format('Y-m-d') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">لا توجد عمليات حالياً.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
