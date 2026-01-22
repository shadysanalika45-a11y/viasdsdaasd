@extends('layouts.app')

@section('title', 'تقييمات الفيديو')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">نظام تقييم الفيديوهات</h1>
        <p class="text-muted">اطلع على تقييمات العملاء باستخدام نظام النجوم أو التقييم الرقمي.</p>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>الفيديو</th>
                                <th>التقييم</th>
                                <th>عدد المراجعات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ratings as $rating)
                                <tr>
                                    <td>{{ $rating['video'] }}</td>
                                    <td>{{ $rating['score'] }} / 5</td>
                                    <td>{{ $rating['count'] }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">لا توجد تقييمات حالياً.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
