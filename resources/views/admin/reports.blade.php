@extends('layouts.app')

@section('title', 'التقارير الحية')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">التقارير الحية</h1>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">عودة للوحة التحكم</a>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">إجمالي الرصيد المضاف</h5>
                        <p class="display-6">{{ number_format($totalBalance, 2) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">إجمالي نقاط الفيديو</h5>
                        <p class="display-6">{{ number_format($totalPoints) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">الاشتراكات النشطة</h5>
                        <p class="display-6">{{ $activeSubscriptions }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">الرصيد المضاف يوميًا</h5>
                        <canvas id="balanceChart" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">الفيديوهات المرفوعة يوميًا</h5>
                        <canvas id="videoChart" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const balanceLabels = @json($balanceSummary->pluck('day'));
        const balanceTotals = @json($balanceSummary->pluck('total'));
        const videoLabels = @json($videoSummary->pluck('day'));
        const videoTotals = @json($videoSummary->pluck('total'));

        new Chart(document.getElementById('balanceChart'), {
            type: 'line',
            data: {
                labels: balanceLabels,
                datasets: [{
                    label: 'الرصيد المضاف',
                    data: balanceTotals,
                    borderColor: '#0d6efd',
                    backgroundColor: 'rgba(13, 110, 253, 0.1)',
                    tension: 0.3,
                    fill: true,
                }]
            },
        });

        new Chart(document.getElementById('videoChart'), {
            type: 'bar',
            data: {
                labels: videoLabels,
                datasets: [{
                    label: 'الفيديوهات',
                    data: videoTotals,
                    backgroundColor: '#198754',
                }]
            },
        });
    </script>
@endsection
