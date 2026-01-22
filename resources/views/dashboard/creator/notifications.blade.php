@extends('layouts.app')

@section('title', 'إشعارات المنشئ')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">الإشعارات</h1>
        <p class="text-muted">تابع إشعارات التفاعل مع الفيديوهات والطلبات.</p>

        <div class="card">
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @forelse ($notifications as $notification)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $notification }}</span>
                            <span class="badge bg-primary-subtle text-primary">جديد</span>
                        </li>
                    @empty
                        <li class="list-group-item">لا توجد إشعارات حالياً.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
