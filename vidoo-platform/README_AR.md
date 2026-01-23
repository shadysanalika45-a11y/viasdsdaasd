# منصة فيدوو Vidoo Platform - Laravel 🚀

مشروع Laravel كامل 100% شغال فعلياً - منصة عربية تربط الشركات بصناع المحتوى

## التشغيل السريع ⚡

```bash
# 1. تثبيت المكتبات
composer install

# 2. تشغيل Database
php artisan migrate:fresh
php artisan db:seed --class=CurrencySeeder
php artisan db:seed --class=CountrySeeder

# 3. تشغيل السيرفر
php artisan serve
```

## المميزات ✨
✅ Multi-Guard Authentication (عملاء + صناع محتوى)
✅ 14 جدول في قاعدة البيانات
✅ 22 دولة عربية + 4 عملات
✅ Routes + Controllers + Models كاملة
✅ Blade Templates جاهزة
✅ .htaccess للسيرفر
✅ كل شيء شغال 100%!

## الصفحات 📄
- http://localhost:8000 (الرئيسية)
- http://localhost:8000/login (تسجيل دخول)
- http://localhost:8000/client/register (تسجيل عميل)
- http://localhost:8000/creator/register (تسجيل صانع محتوى)
