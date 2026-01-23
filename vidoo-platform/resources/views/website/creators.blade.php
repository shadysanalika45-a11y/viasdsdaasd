@extends('layouts.website')

@section('title', 'صُنّاع المحتوى - فيدوو')

@section('styles')
<link rel="stylesheet" href="{{ asset('creators_files/style.css') }}">
<link rel="stylesheet" href="{{ asset('creators_files/slick.min.css') }}">
@endsection

@section('content')
<div class="container my-5">
    <div class="text-center mb-5">
        <h1 class="mb-3">اجعل كل حملة تسويقية تنبض بالحياة مع فيديوهات <span style="color: #8B5CF6">UGC الفريدة من فيدوو</span></h1>
        <p>تواصل مع أبرز المبدعين العرب في مجالك، حيث الجودة والإبداع يجتمعان في حملاتك التسويقية على منصات TikTok وMeta</p>
    </div>

    @if(isset($creators) && $creators->count() > 0)
        <div class="row">
            @foreach($creators as $creator)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card creator-card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                @if($creator->avatar)
                                    <img src="{{ asset('storage/' . $creator->avatar) }}" alt="{{ $creator->name }}" class="rounded-circle me-3" width="60" height="60">
                                @else
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
                                        <span class="h4 mb-0">{{ substr($creator->name, 0, 1) }}</span>
                                    </div>
                                @endif
                                <div>
                                    <h5 class="mb-0">{{ $creator->name }}</h5>
                                    <small class="text-muted">{{ $creator->country->name }}</small>
                                </div>
                            </div>

                            @if($creator->bio)
                                <p class="text-muted small">{{ Str::limit($creator->bio, 100) }}</p>
                            @endif

                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge bg-warning text-dark">
                                        <i class="bi bi-star-fill"></i> {{ $creator->rating }}/5
                                    </span>
                                </div>
                                <div>
                                    <small class="text-muted">{{ $creator->completed_projects }} مشروع مكتمل</small>
                                </div>
                            </div>

                            @if($creator->portfolios->count() > 0)
                                <div class="mt-3">
                                    <small class="text-muted">معرض الأعمال:</small>
                                    <div class="d-flex gap-2 mt-2">
                                        @foreach($creator->portfolios->take(3) as $portfolio)
                                            @if($portfolio->thumbnail)
                                                <img src="{{ asset('storage/' . $portfolio->thumbnail) }}" alt="Portfolio" class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <div class="mt-3">
                                <a href="{{ route('login') }}" class="btn btn-primary btn-sm w-100">تواصل الآن</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $creators->links() }}
        </div>
    @else
        <div class="alert alert-info text-center">
            <p class="mb-0">لا يوجد صُناع محتوى متاحون حالياً</p>
        </div>
    @endif
</div>
@endsection
