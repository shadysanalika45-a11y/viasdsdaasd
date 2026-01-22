@extends('layouts.app')

@section('title', 'طلب فيديو جديد')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">طلب فيديو جديد</h1>
        <p class="text-muted">أرسل تفاصيل الفيديو المطلوب لمنشئ المحتوى المناسب.</p>

        <div class="card">
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label" for="requestTitle">عنوان الفيديو</label>
                        <input type="text" id="requestTitle" class="form-control" placeholder="مثال: فيديو ترويجي لمنتج جديد">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="requestCategory">الفئة</label>
                        <select id="requestCategory" class="form-select">
                            <option>إعلاني</option>
                            <option>تعليمي</option>
                            <option>تقييم منتج</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="requestDetails">التفاصيل المطلوبة</label>
                        <textarea id="requestDetails" class="form-control" rows="4"
                            placeholder="اذكر الفكرة، الرسائل الأساسية، ومدة الفيديو المطلوبة"></textarea>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="requestBudget">الميزانية المتوقعة</label>
                            <input type="number" id="requestBudget" class="form-control" placeholder="مثال: 500">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="requestDeadline">موعد التسليم</label>
                            <input type="date" id="requestDeadline" class="form-control">
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="submit">إرسال الطلب</button>
                </form>
            </div>
        </div>
    </div>
@endsection
