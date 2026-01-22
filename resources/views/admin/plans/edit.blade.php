@extends('layouts.app')

@section('title', 'تعديل الباقة')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">تعديل الباقة</h1>
            <a href="{{ route('admin.plans.index') }}" class="btn btn-outline-secondary">عودة</a>
        </div>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.plans.update', $plan) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">اسم الباقة</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $plan->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">السعر</label>
                        <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $plan->price) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">المدة</label>
                        <select name="interval" class="form-select" required>
                            <option value="month" @selected(old('interval', $plan->interval) === 'month')>شهري</option>
                            <option value="year" @selected(old('interval', $plan->interval) === 'year')>سنوي</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">المزايا (كل ميزة في سطر)</label>
                        <textarea name="features" class="form-control" rows="4">{{ old('features', $features) }}</textarea>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" @checked(old('is_active', $plan->is_active))>
                        <label class="form-check-label">تفعيل الباقة</label>
                    </div>

                    <button type="submit" class="btn btn-primary">تحديث</button>
                </form>
            </div>
        </div>
    </div>
@endsection
