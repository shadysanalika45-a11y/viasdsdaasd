@extends('layouts.app')

@section('title', 'لوحة الإدارة')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-4">لوحة الإدارة</h1>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">المستخدمون</h5>
                        <p class="display-6">{{ $users }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">الاشتراكات</h5>
                        <p class="display-6">{{ $subscriptions }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">المدفوعات</h5>
                        <p class="display-6">{{ $payments }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
