@extends('layouts.app')

@section('title', 'رسائل المنشئ')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">رسائل العملاء</h1>
        <p class="text-muted">تواصل مع العملاء ورد على استفساراتهم بسرعة.</p>

        <div class="row g-4">
            <div class="col-lg-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">المحادثات</h5>
                        <ul class="list-group list-group-flush">
                            @foreach ($threads as $thread)
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <strong>{{ $thread['name'] }}</strong>
                                        <span class="badge bg-secondary">{{ $thread['status'] }}</span>
                                    </div>
                                    <p class="mb-0 text-muted">{{ $thread['last_message'] }}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">الرد السريع</h5>
                        <form>
                            <div class="mb-3">
                                <label class="form-label" for="replyTo">العميل</label>
                                <input type="text" id="replyTo" class="form-control" placeholder="اسم العميل">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="replyMessage">الرسالة</label>
                                <textarea id="replyMessage" class="form-control" rows="4" placeholder="اكتب الرد..."></textarea>
                            </div>
                            <button class="btn btn-primary" type="submit">إرسال الرد</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
