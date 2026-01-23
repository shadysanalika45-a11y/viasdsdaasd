@extends('layouts.website')

@section('title', 'لوحة التحكم - العميل')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h2>مرحباً، {{ $client->name }}</h2>
            <p class="text-muted">{{ $client->email }}</p>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5>المشاريع الكلية</h5>
                    <h2>{{ $client->projects()->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5>المشاريع النشطة</h5>
                    <h2>{{ $client->projects()->whereIn('status', ['pending', 'in_progress'])->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5>المشاريع المكتملة</h5>
                    <h2>{{ $client->projects()->where('status', 'completed')->count() }}</h2>
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
                                <th>صانع المحتوى</th>
                                <th>الميزانية</th>
                                <th>الحالة</th>
                                <th>التاريخ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                            <tr>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->creator ? $project->creator->name : 'غير محدد' }}</td>
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
