@extends('layouts.app')

@section('title', 'إضافة فيديو')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">إضافة فيديو جديد</h1>
        <p class="text-muted">ارفع الفيديو وحدد الفئة والعنوان والوصف.</p>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('creator.videos.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="videoTitle">عنوان الفيديو</label>
                        <input type="text" id="videoTitle" name="title" class="form-control"
                            placeholder="مثال: مراجعة تطبيق جديد">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="videoCategory">الفئة</label>
                        <select id="videoCategory" name="category" class="form-select">
                            @foreach ($categories as $category)
                                <option value="{{ $category }}">{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="videoDescription">الوصف</label>
                        <textarea id="videoDescription" name="description" class="form-control" rows="4"
                            placeholder="قدّم وصفًا مختصرًا للفيديو"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="videoUrl">رابط الفيديو</label>
                        <input type="url" id="videoUrl" name="video_url" class="form-control"
                            placeholder="https://">
                    </div>
                    <button type="submit" class="btn btn-primary">رفع الفيديو</button>
                </form>
            </div>
        </div>
    </div>
@endsection
