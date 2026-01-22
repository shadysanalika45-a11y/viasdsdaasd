@extends('layouts.app')

@section('title', 'لوحة منشئ المحتوى')
@section('show_sidebar', 'true')

@section('content')
    <div class="container my-4">
        <h1 class="mb-3">لوحة منشئ المحتوى</h1>
        <p class="text-muted">إدارة الطلبات، العروض، والإحصائيات الخاصة بك.</p>

        <div class="row g-4 mt-2">
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">الاشتراك الحالي</h5>
                        @if ($subscription)
                            <p class="mb-1">الخطة: <strong>{{ $subscription->plan->name ?? 'غير محددة' }}</strong></p>
                            <p class="mb-1">المدة: {{ $subscription->plan->interval === 'year' ? 'سنوي' : 'شهري' }}</p>
                            <p class="mb-1">الحالة: {{ $subscription->status }}</p>
                            <p class="mb-0">تاريخ الانتهاء: {{ optional($subscription->ends_at)->format('Y-m-d') }}</p>
                        @else
                            <p>لا يوجد اشتراك نشط حالياً.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">الطلبات الجديدة</h5>
                        <p>راجع طلبات الحملات الإعلانية القادمة من العملاء.</p>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>رقم الطلب</th>
                                        <th>الوصف</th>
                                        <th>الحالة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#104</td>
                                        <td>فيديو إعلان منتج جديد</td>
                                        <td>قيد التنفيذ</td>
                                    </tr>
                                    <tr>
                                        <td>#105</td>
                                        <td>فيديو مراجعة تطبيق</td>
                                        <td>قيد المراجعة</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <form class="mt-3" action="{{ route('dashboard.creator.orders.status', '104') }}" method="POST">
                            @csrf
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <select class="form-select" name="status">
                                        <option value="pending">قيد المراجعة</option>
                                        <option value="in_progress">قيد التنفيذ</option>
                                        <option value="completed">مكتمل</option>
                                        <option value="rejected">مرفوض</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="url" name="delivery_url" class="form-control"
                                        placeholder="رابط التسليم">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" name="notes" rows="2" placeholder="ملاحظات"></textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary mt-3" type="submit">تحديث الحالة</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">إحصائيات الأداء</h5>
                        <ul class="list-unstyled">
                            <li>المشاهدات هذا الشهر: 0</li>
                            <li>التفاعل مع الإعلانات: 0</li>
                            <li>عدد الحملات المكتملة: 0</li>
                        </ul>
                        <div class="d-flex gap-2 mt-3">
                            <a href="{{ route('creator.video.points') }}" class="btn btn-outline-primary">نقاط الفيديو</a>
                            <a href="{{ route('creator.balance') }}" class="btn btn-outline-secondary">الرصيد</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">إدارة الحساب والعروض</h5>
                        <p>قم بتحديث بياناتك وإدارة تكلفة الخدمة.</p>
                        <a href="{{ route('profile') }}" class="btn btn-outline-secondary mb-3">تحديث البيانات</a>
                        <form action="{{ route('dashboard.creator.offer') }}" method="POST">
                            @csrf
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="price" placeholder="تكلفة الخدمة">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="package" placeholder="وصف العرض">
                                </div>
                            </div>
                            <button class="btn btn-outline-primary mt-3" type="submit">حفظ العرض</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">التقييمات والتعليقات</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">لا توجد تقييمات حتى الآن.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">المعاملات والفواتير</h5>
                        <p>متابعة المدفوعات والحالات المالية.</p>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>الفاتورة</th>
                                        <th>المبلغ</th>
                                        <th>الحالة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#INV-001</td>
                                        <td>0</td>
                                        <td>معلقة</td>
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
                        <h5 class="card-title">الدعم</h5>
                        <form action="{{ route('dashboard.creator.support') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="support_subject">عنوان الرسالة</label>
                                <input type="text" class="form-control" id="support_subject" name="subject"
                                    placeholder="مثال: مشكلة في الطلب">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="support_message">رسالتك</label>
                                <textarea class="form-control" id="support_message" name="message" rows="4"
                                    placeholder="اكتب تفاصيل المشكلة أو الاستفسار"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">إرسال الرسالة</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">روابط سريعة</h5>
                        <div class="d-flex flex-wrap gap-2">
                            <a class="btn btn-outline-secondary" href="{{ route('creator.add-video') }}">إضافة فيديو</a>
                            <a class="btn btn-outline-secondary" href="{{ route('creator.blog') }}">المدونة</a>
                            <a class="btn btn-outline-secondary" href="{{ route('creator.orders') }}">الطلبات الواردة</a>
                            <a class="btn btn-outline-secondary" href="{{ route('creator.messages') }}">الرسائل</a>
                            <a class="btn btn-outline-secondary" href="{{ route('creator.notifications') }}">الإشعارات</a>
                            <a class="btn btn-outline-secondary" href="{{ route('creator.statistics') }}">الإحصائيات</a>
                            <a class="btn btn-outline-secondary" href="{{ route('creator.reels') }}">ريلز</a>
                            <a class="btn btn-outline-secondary" href="{{ route('creator.ratings') }}">تقييمات الفيديو</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
