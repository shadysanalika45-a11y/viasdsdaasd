@extends('layouts.app')

@section('title', 'بحث العميل')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">البحث المتقدم</h1>
        <p class="text-muted">ابحث عن الفيديوهات، المبدعين، أو الحملات الإعلانية بسهولة.</p>

        <div class="card mb-4">
            <div class="card-body">
                <form class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="searchQuery">كلمة البحث</label>
                        <input type="text" id="searchQuery" class="form-control" placeholder="مثال: حملة رمضان">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="searchType">نوع البحث</label>
                        <select id="searchType" class="form-select">
                            @foreach ($filters as $filter)
                                <option value="{{ $filter }}">{{ $filter }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="searchDate">الفترة الزمنية</label>
                        <input type="date" id="searchDate" class="form-control">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">بحث</button>
                        <button class="btn btn-outline-secondary" type="reset">إعادة تعيين</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">عمليات البحث الأخيرة</h5>
                        <ul class="list-group list-group-flush">
                            @foreach ($recentSearches as $search)
                                <li class="list-group-item">{{ $search }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">النتائج المقترحة</h5>
                        <p class="text-muted mb-0">ابدأ البحث لاستعراض النتائج المطابقة.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
