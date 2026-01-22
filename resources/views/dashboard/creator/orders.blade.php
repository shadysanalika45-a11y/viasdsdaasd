@extends('layouts.app')

@section('title', 'الطلبات الواردة')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">الطلبات الواردة</h1>
        <p class="text-muted">راجع الطلبات المخصصة القادمة من العملاء.</p>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>رقم الطلب</th>
                                <th>العميل</th>
                                <th>الحالة</th>
                                <th>إجراء سريع</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td>{{ $order['id'] }}</td>
                                    <td>{{ $order['client'] }}</td>
                                    <td>{{ $order['status'] }}</td>
                                    <td><button class="btn btn-outline-primary btn-sm">مراجعة الطلب</button></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">لا توجد طلبات حالياً.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
