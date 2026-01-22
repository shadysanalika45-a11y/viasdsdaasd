@extends('layouts.app')

@section('title', 'نقاط الفيديو')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">نقاط الفيديو</h1>
        <p class="text-muted">عرض النقاط المكتسبة من الفيديوهات المرفوعة.</p>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">إجمالي النقاط</h5>
                        <p class="display-6">{{ $totalPoints }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">رفع فيديو جديد</h5>
                        <form action="{{ route('creator.videos.store') }}" method="POST">
                            @csrf
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title" placeholder="عنوان الفيديو">
                                </div>
                                <div class="col-md-6">
                                    <input type="url" class="form-control" name="url" placeholder="رابط الفيديو">
                                </div>
                                <div class="col-12">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="is_promoted" value="1">
                                        فيديو مُروج
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">رفع الفيديو</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">آخر الفيديوهات</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>العنوان</th>
                                        <th>الرابط</th>
                                        <th>النقاط</th>
                                        <th>التقييم</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($videos as $video)
                                        <tr>
                                            <td>{{ $video->title }}</td>
                                            <td><a href="{{ $video->url }}" target="_blank">عرض</a></td>
                                            <td>{{ $video->points_awarded }}</td>
                                            <td>{{ number_format($video->average_rating, 2) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">لا توجد فيديوهات حتى الآن.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
