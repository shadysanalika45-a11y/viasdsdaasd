@extends('layouts.app')

@section('title', 'تعديل المستخدم')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">تعديل بيانات المستخدم</h1>

        <form method="POST" action="{{ route('admin.users.update', $user) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label" for="name">الاسم</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', $user->name) }}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">البريد الإلكتروني</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email', $user->email) }}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="role">الدور</label>
                <select class="form-select" id="role" name="role">
                    @foreach (['buyer' => 'عميل', 'company' => 'شركة', 'creator' => 'منشئ', 'admin' => 'مدير'] as $value => $label)
                        <option value="{{ $value }}" @selected(old('role', $user->role) === $value)>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="status">الحالة</label>
                <select class="form-select" id="status" name="status">
                    @foreach (['active' => 'نشط', 'inactive' => 'غير نشط'] as $value => $label)
                        <option value="{{ $value }}" @selected(old('status', $user->status) === $value)>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">حفظ</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">عودة</a>
        </form>
    </div>
@endsection
