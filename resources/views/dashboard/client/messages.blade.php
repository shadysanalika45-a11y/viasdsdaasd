@extends('layouts.app')

@section('title', 'رسائل العميل')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">الرسائل</h1>
        <p class="text-muted">تواصل مع منشئي المحتوى بسهولة وأرسل الرسائل مباشرة.</p>

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
                        <h5 class="card-title">إرسال رسالة جديدة</h5>
                        <form>
                            <div class="mb-3">
                                <label class="form-label" for="messageRecipient">المستلم</label>
                                <input type="text" id="messageRecipient" class="form-control" placeholder="اسم منشئ المحتوى">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="messageContent">نص الرسالة</label>
                                <textarea id="messageContent" class="form-control" rows="4" placeholder="اكتب رسالتك..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">إرسال</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
