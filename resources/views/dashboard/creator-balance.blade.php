@extends('layouts.app')

@section('title', 'رصيد منشئ المحتوى')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">رصيد منشئ المحتوى</h1>
        <p class="text-muted">عرض الرصيد وسحب الأرباح المتاحة.</p>

        <div class="row g-4">
            <div class="col-lg-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">الرصيد المتاح</h5>
                        <p class="display-6">{{ $balance?->amount ?? '0.00' }} {{ $balance?->currency ?? 'USD' }}</p>
                        <p class="text-muted">آخر تحديث: {{ $balance?->updated_at?->format('Y-m-d') ?? '-' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">طلب سحب</h5>
                        <form action="{{ route('withdraw.balance') }}" method="POST">
                            @csrf
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <input type="number" class="form-control" name="amount" placeholder="المبلغ">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="method" placeholder="وسيلة التحويل">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="details" placeholder="بيانات التحويل">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">إرسال الطلب</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">سجل العمليات</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>النوع</th>
                                        <th>المبلغ</th>
                                        <th>الحالة</th>
                                        <th>الوصف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->type }}</td>
                                            <td>{{ $transaction->amount }}</td>
                                            <td>{{ $transaction->status }}</td>
                                            <td>{{ $transaction->description }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">لا توجد عمليات بعد.</td>
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
