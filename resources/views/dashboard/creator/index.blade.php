@extends('layouts.app')

@section('title', 'لوحة منشئ المحتوى')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">لوحة منشئ المحتوى</h1>
        <p class="mb-4">من هنا يمكنك نشر فيديو تعريفي، إدارة الرصيد، متابعة الطلبات، والتواصل مع الدعم.</p>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">فيديو تعريفي (ريلز)</h5>
                        <p class="card-text">أضف رابط فيديو تعريفي يظهر للعملاء في صفحة صُنّاع المحتوى.</p>
                        <form action="{{ route('dashboard.creator.intro-video') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="intro_video_title">عنوان الفيديو</label>
                                <input type="text" class="form-control" id="intro_video_title"
                                    name="intro_video_title" placeholder="مثال: فيديو تعريفي سريع">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="intro_video_url">رابط الفيديو</label>
                                <input type="url" class="form-control" id="intro_video_url" name="intro_video_url"
                                    placeholder="https://">
                            </div>
                            <button type="submit" class="btn btn-primary">نشر الفيديو</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">الرصيد والمدفوعات</h5>
                        <p class="card-text">أضف رصيدك أو اسحب أرباحك بسهولة.</p>

                        <form class="mb-4" action="{{ route('dashboard.creator.balance.deposit') }}" method="POST">
                            @csrf
                            <h6>إضافة رصيد</h6>
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="amount" placeholder="المبلغ">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="method"
                                        placeholder="وسيلة الدفع">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary mt-3">إضافة رصيد</button>
                        </form>

                        <form action="{{ route('dashboard.creator.balance.withdraw') }}" method="POST">
                            @csrf
                            <h6>سحب رصيد</h6>
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <input type="number" class="form-control" name="amount" placeholder="المبلغ">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="payout_method"
                                        placeholder="وسيلة التحويل">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="payout_details"
                                        placeholder="بيانات التحويل">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-secondary mt-3">طلب سحب</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">الطلبات الواردة</h5>
                        <p class="card-text">تابع طلبات الفيديو من العملاء وحدّث الحالة.</p>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>رقم الطلب</th>
                                        <th>الوصف</th>
                                        <th>مدة الفيديو</th>
                                        <th>الحالة</th>
                                        <th>تحديث</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#104</td>
                                        <td>فيديو إعلان منتج جديد</td>
                                        <td>30 ثانية</td>
                                        <td>قيد التنفيذ</td>
                                        <td>
                                            <form class="d-flex flex-column gap-2"
                                                action="{{ route('dashboard.creator.orders.status', '104') }}"
                                                method="POST">
                                                @csrf
                                                <select class="form-select" name="status">
                                                    <option value="pending">قيد المراجعة</option>
                                                    <option value="in_progress" selected>قيد التنفيذ</option>
                                                    <option value="completed">مكتمل</option>
                                                    <option value="rejected">مرفوض</option>
                                                </select>
                                                <input type="url" name="delivery_url" class="form-control"
                                                    placeholder="رابط الفيديو النهائي">
                                                <textarea class="form-control" name="notes" rows="2"
                                                    placeholder="ملاحظات"></textarea>
                                                <button class="btn btn-sm btn-primary" type="submit">تحديث</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#105</td>
                                        <td>فيديو مراجعة تطبيق</td>
                                        <td>45 ثانية</td>
                                        <td>قيد المراجعة</td>
                                        <td>
                                            <form class="d-flex flex-column gap-2"
                                                action="{{ route('dashboard.creator.orders.status', '105') }}"
                                                method="POST">
                                                @csrf
                                                <select class="form-select" name="status">
                                                    <option value="pending" selected>قيد المراجعة</option>
                                                    <option value="in_progress">قيد التنفيذ</option>
                                                    <option value="completed">مكتمل</option>
                                                    <option value="rejected">مرفوض</option>
                                                </select>
                                                <textarea class="form-control" name="notes" rows="2"
                                                    placeholder="ملاحظات"></textarea>
                                                <button class="btn btn-sm btn-primary" type="submit">تحديث</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">الدعم المباشر</h5>
                        <p class="card-text">تواصل مع فريق الدعم عبر رسالة أو افتح تذكرة.</p>
                        <form action="{{ route('dashboard.creator.support') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="support_subject">عنوان الرسالة</label>
                                <input type="text" class="form-control" id="support_subject" name="subject"
                                    placeholder="مثال: مشكلة في الطلب">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="support_message">رسالتك</label>
                                <textarea class="form-control" id="support_message" name="message" rows="5"
                                    placeholder="اكتب تفاصيل المشكلة أو الاستفسار"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">إرسال الرسالة</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
