@extends('layouts.app')

@section('title', 'إدارة أقسام الموقع')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-4">أقسام إدارة المحتوى</h1>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>الصفحة</th>
                        <th>المفتاح</th>
                        <th>آخر تحديث</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sections as $section)
                        <tr>
                            <td>{{ $section->page }}</td>
                            <td>{{ $section->key }}</td>
                            <td>{{ $section->updated_at?->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('admin.cms-sections.edit', $section) }}"
                                    class="btn btn-sm btn-outline-primary">تعديل</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
