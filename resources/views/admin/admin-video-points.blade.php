@extends('layouts.app')

@section('title', 'إعدادات نقاط الفيديو')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">إعدادات نقاط الفيديو</h1>
        <p class="text-muted">تحديد عدد النقاط لكل فيديو وقيمة النقطة المالية.</p>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.video.points.update') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label" for="video_points_per_upload">نقاط لكل فيديو</label>
                            <input type="number" class="form-control" id="video_points_per_upload"
                                name="video_points_per_upload" value="{{ $pointsPerVideo }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="video_points_promoted_bonus">نقاط إضافية للمروج</label>
                            <input type="number" class="form-control" id="video_points_promoted_bonus"
                                name="video_points_promoted_bonus" value="{{ $promotedBonus }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="video_point_value">قيمة النقطة (بالدولار)</label>
                            <input type="number" step="0.01" class="form-control" id="video_point_value"
                                name="video_point_value" value="{{ $pointValue }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">حفظ الإعدادات</button>
                </form>
            </div>
        </div>
    </div>
@endsection
