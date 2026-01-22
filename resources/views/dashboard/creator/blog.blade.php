@extends('layouts.app')

@section('title', 'المدونة')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">مدونة منشئ المحتوى</h1>
        <p class="text-muted">شارك أفكارك أو محتوى طويل مع جمهورك.</p>

        <div class="row g-4">
            <div class="col-lg-7">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">كتابة تدوينة جديدة</h5>
                        <form>
                            <div class="mb-3">
                                <label class="form-label" for="blogTitle">عنوان التدوينة</label>
                                <input type="text" id="blogTitle" class="form-control" placeholder="عنوان ملهم">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="blogContent">المحتوى</label>
                                <textarea id="blogContent" class="form-control" rows="6"
                                    placeholder="اكتب أفكارك هنا..."></textarea>
                            </div>
                            <button class="btn btn-primary" type="submit">نشر التدوينة</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">مسودات سابقة</h5>
                        <ul class="list-group list-group-flush">
                            @foreach ($drafts as $draft)
                                <li class="list-group-item">{{ $draft }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
