@extends('layouts.app')

@section('title', 'التسويق')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">الحملات التسويقية</h1>
        <p class="text-muted">تابع أداء الحملات الحالية وتفاعل الجمهور.</p>

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">إحصائيات سريعة</h5>
                <div class="row text-center">
                    <div class="col-md-4">
                        <p class="mb-1">الحملات النشطة</p>
                        <h4 class="mb-0">2</h4>
                    </div>
                    <div class="col-md-4">
                        <p class="mb-1">إجمالي المشاهدات</p>
                        <h4 class="mb-0">2,060</h4>
                    </div>
                    <div class="col-md-4">
                        <p class="mb-1">متوسط التفاعل</p>
                        <h4 class="mb-0">4%</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">الحملات الحالية</h5>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>الحملة</th>
                                <th>المشاهدات</th>
                                <th>التفاعل</th>
                                <th>الحالة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($campaigns as $campaign)
                                <tr>
                                    <td>{{ $campaign['name'] }}</td>
                                    <td>{{ $campaign['views'] }}</td>
                                    <td>{{ $campaign['engagement'] }}</td>
                                    <td><span class="badge bg-success">نشطة</span></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">لا توجد حملات حالياً.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
