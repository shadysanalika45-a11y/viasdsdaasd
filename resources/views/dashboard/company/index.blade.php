@extends('layouts.app')

@section('title', 'لوحة الشركة')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">لوحة تحكم الشركة</h1>
        <p>إدارة الحملات، الطلبات، والفيديوهات ضمن حساب الشركة.</p>

        <div class="row g-4 mt-2">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">حملات التسويق</h5>
                        <p class="card-text">أنشئ حملات جديدة وحدد الأهداف والفئة المستهدفة.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">المحتوى المطلوب</h5>
                        <p class="card-text">تابع مقاطع الفيديو المطلوبة من صُنّاع المحتوى.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
