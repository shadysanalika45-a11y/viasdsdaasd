@extends('layouts.app')

@section('title', 'إحصائيات الفيديو')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">إحصائيات الفيديوهات</h1>
        <p class="text-muted">تابع أداء الفيديوهات والنقاط المكتسبة.</p>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <p class="text-muted mb-1">المشاهدات</p>
                        <h4>{{ number_format($stats['views']) }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <p class="text-muted mb-1">الإعجابات</p>
                        <h4>{{ number_format($stats['likes']) }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <p class="text-muted mb-1">التعليقات</p>
                        <h4>{{ number_format($stats['comments']) }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <p class="text-muted mb-1">النقاط</p>
                        <h4>{{ number_format($stats['points']) }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">تحليل الأداء</h5>
                <p class="text-muted mb-0">يتم تحديث الإحصائيات تلقائيًا مع تفاعل الجمهور على الفيديوهات.</p>
            </div>
        </div>
    </div>
@endsection
