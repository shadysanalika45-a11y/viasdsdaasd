@extends('layouts.app')

@section('title', 'إدارة الرسائل')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">إدارة الرسائل</h1>
        <p class="text-muted">مراقبة الرسائل بين العملاء ومنشئي المحتوى وإزالة المحتوى غير اللائق.</p>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">بلاغات الرسائل</h5>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>المحادثة</th>
                                <th>سبب البلاغ</th>
                                <th>الحالة</th>
                                <th>الإجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($flags as $flag)
                                <tr>
                                    <td>{{ $flag['thread'] }}</td>
                                    <td>{{ $flag['reason'] }}</td>
                                    <td>{{ $flag['status'] }}</td>
                                    <td>
                                        <button class="btn btn-outline-danger btn-sm">حذف الرسالة</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">لا توجد بلاغات حالياً.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
