@extends('layouts.website')

@section('title', 'لوحة التحكم - صانع المحتوى')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h2>مرحباً، {{ $creator->name }}</h2>
            <p class="text-muted">{{ $creator->email }}</p>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>المشاريع المكتملة</h5>
                    <h2>{{ $creator->completed_projects }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>التقييم</h5>
                    <h2>{{ $creator->rating }}/5</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>المتابعين</h5>
                    <h2>{{ number_format($creator->followers_count) }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>معرض الأعمال</h5>
                    <h2>{{ $creator->portfolios()->count() }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <h4>مشاريعي</h4>
            @if($projects->count() > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>العنوان</th>
                                <th>العميل</th>
                                <th>الميزانية</th>
                                <th>الحالة</th>
                                <th>التاريخ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                            <tr>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->client->name }}</td>
                                <td>{{ $project->budget }} {{ $project->currency->code }}</td>
                                <td>
                                    <span class="badge bg-info">{{ $project->status }}</span>
                                </td>
                                <td>{{ $project->created_at->format('Y-m-d') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $projects->links() }}
            @else
                <p class="text-muted">لا توجد مشاريع بعد</p>
            @endif
        </div>
    </div>
</div>
@endsection
