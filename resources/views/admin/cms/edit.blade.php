@extends('layouts.app')

@section('title', 'تعديل قسم المحتوى')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">تعديل القسم</h1>
        <p class="text-muted">الصفحة: {{ $section->page }} · المفتاح: {{ $section->key }}</p>

        <form method="POST" action="{{ route('admin.cms-sections.update', $section) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label" for="content">المحتوى</label>
                <textarea class="form-control" id="content" name="content" rows="8">{{ old('content', $section->content) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
            <a href="{{ route('admin.cms-sections.index') }}" class="btn btn-outline-secondary">عودة</a>
        </form>
    </div>
@endsection
