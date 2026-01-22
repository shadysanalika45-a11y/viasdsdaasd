@extends('layouts.app')

@section('title', 'إدارة الباقات')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">إدارة الباقات</h1>
            <a href="{{ route('admin.plans.create') }}" class="btn btn-primary">إضافة باقة</a>
        </div>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>الاسم</th>
                                <th>السعر</th>
                                <th>المدة</th>
                                <th>الحالة</th>
                                <th class="text-end">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($plans as $plan)
                                <tr>
                                    <td>{{ $plan->name }}</td>
                                    <td>{{ number_format($plan->price, 2) }}</td>
                                    <td>{{ $plan->interval === 'year' ? 'سنوي' : 'شهري' }}</td>
                                    <td>{{ $plan->is_active ? 'نشطة' : 'غير نشطة' }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.plans.edit', $plan) }}" class="btn btn-sm btn-outline-primary">تعديل</a>
                                        <form action="{{ route('admin.plans.destroy', $plan) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">لا توجد باقات بعد.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
