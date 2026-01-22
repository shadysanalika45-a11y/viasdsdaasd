@extends('layouts.app')

@section('title', 'ريلز')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">الفيديوهات بالطول (Reels)</h1>
        <p class="text-muted">استعرض الفيديوهات الطولية وقم بالتبديل بينها بسهولة.</p>

        <div class="row g-4">
            @forelse ($reels as $reel)
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $reel }}</h5>
                            <p class="text-muted">مدة الفيديو: 30 ثانية</p>
                            <button class="btn btn-outline-primary">مشاهدة</button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="mb-0">لا توجد فيديوهات ريلز بعد.</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
