@extends('layouts.app')

@section('title', 'طلبات الدفع اليدوي')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-4">طلبات الدفع اليدوي</h1>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>المستخدم</th>
                        <th>الخطة</th>
                        <th>الحالة</th>
                        <th>تاريخ الطلب</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($proofs as $proof)
                        <tr>
                            <td>{{ $proof->payment->user->name ?? 'غير معروف' }}</td>
                            <td>{{ $proof->payment->plan_id }}</td>
                            <td>{{ $proof->status }}</td>
                            <td>{{ $proof->created_at?->format('Y-m-d') }}</td>
                            <td class="d-flex gap-2">
                                <form method="POST" action="{{ route('admin.manual-payments.approve', $proof) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success">قبول</button>
                                </form>
                                <form method="POST" action="{{ route('admin.manual-payments.reject', $proof) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">رفض</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">لا توجد طلبات حالية.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
