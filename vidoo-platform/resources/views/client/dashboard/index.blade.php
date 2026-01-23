@extends('layouts.website')

@section('title', 'لوحة التحكم - العميل')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">مرحباً، {{ $client->name }}</h2>
            @if($client->company_name)
                <p class="text-muted">{{ $client->company_name }}</p>
            @endif
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-4 mb-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>إجمالي المشاريع</h5>
                    <h2>{{ $client->projects()->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>المشاريع المكتملة</h5>
                    <h2>{{ $client->projects()->where('status', 'completed')->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5>قيد التنفيذ</h5>
                    <h2>{{ $client->projects()->where('status', 'in_progress')->count() }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">مشاريعي</h5>
                    <a href="#" class="btn btn-primary btn-sm">مشروع جديد</a>
                </div>
                <div class="card-body">
                    @if($projects->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>العنوان</th>
                                        <th>صانع المحتوى</th>
                                        <th>الميزانية</th>
                                        <th>الحالة</th>
                                        <th>التاريخ</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($projects as $project)
                                    <tr>
                                        <td>{{ $project->title }}</td>
                                        <td>
                                            @if($project->creator)
                                                {{ $project->creator->name }}
                                            @else
                                                <span class="text-muted">لم يُحدد بعد</span>
                                            @endif
                                        </td>
                                        <td>{{ $project->budget }} {{ $project->currency->code }}</td>
                                        <td>
                                            @if($project->status == 'completed')
                                                <span class="badge bg-success">مكتمل</span>
                                            @elseif($project->status == 'in_progress')
                                                <span class="badge bg-warning">قيد التنفيذ</span>
                                            @elseif($project->status == 'pending')
                                                <span class="badge bg-info">قيد المراجعة</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $project->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $project->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-outline-primary">عرض</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            {{ $projects->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <p class="text-muted mb-3">لا توجد مشاريع بعد</p>
                            <a href="#" class="btn btn-primary">ابدأ مشروعك الأول</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
