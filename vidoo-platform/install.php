#!/usr/bin/env php
<?php

/**
 * فيدوو - برنامج التثبيت التلقائي
 * Vidoo Platform Auto Installer
 */

class VidooInstaller
{
    private $baseDir;
    private $errors = [];
    private $success = [];

    public function __construct()
    {
        $this->baseDir = __DIR__;
    }

    public function run()
    {
        $this->printHeader();
        
        echo "بدء التثبيت التلقائي...\n\n";
        
        // Step 1: Check Requirements
        $this->checkRequirements();
        
        // Step 2: Install Composer Dependencies
        $this->installComposerDependencies();
        
        // Step 3: Setup Environment
        $this->setupEnvironment();
        
        // Step 4: Setup Database
        $this->setupDatabase();
        
        // Step 5: Run Migrations & Seeders
        $this->runMigrationsAndSeeders();
        
        // Step 6: Setup Assets
        $this->setupAssets();
        
        // Step 7: Set Permissions
        $this->setPermissions();
        
        // Final Report
        $this->printReport();
    }

    private function printHeader()
    {
        echo "\n";
        echo "╔═══════════════════════════════════════════════════╗\n";
        echo "║                                                   ║\n";
        echo "║          🎬 منصة فيدوو - التثبيت التلقائي       ║\n";
        echo "║               Vidoo Platform Installer            ║\n";
        echo "║                                                   ║\n";
        echo "╚═══════════════════════════════════════════════════╝\n\n";
    }

    private function checkRequirements()
    {
        echo "🔍 فحص المتطلبات الأساسية...\n";
        
        // Check PHP Version
        $phpVersion = phpversion();
        if (version_compare($phpVersion, '8.2.0', '>=')) {
            $this->success[] = "✅ PHP Version: $phpVersion";
            echo "   ✅ PHP $phpVersion\n";
        } else {
            $this->errors[] = "❌ PHP 8.2+ مطلوب. النسخة الحالية: $phpVersion";
            echo "   ❌ PHP $phpVersion (يجب 8.2+)\n";
        }
        
        // Check Composer
        if ($this->commandExists('composer')) {
            $this->success[] = "✅ Composer متوفر";
            echo "   ✅ Composer\n";
        } else {
            $this->errors[] = "❌ Composer غير مثبت";
            echo "   ❌ Composer (غير متوفر)\n";
        }
        
        // Check Required Extensions
        $extensions = ['pdo', 'pdo_sqlite', 'mbstring', 'openssl', 'tokenizer', 'xml', 'ctype', 'json'];
        foreach ($extensions as $ext) {
            if (extension_loaded($ext)) {
                echo "   ✅ $ext extension\n";
            } else {
                $this->errors[] = "❌ Extension $ext غير متوفر";
                echo "   ❌ $ext extension\n";
            }
        }
        
        echo "\n";
    }

    private function installComposerDependencies()
    {
        if (!empty($this->errors)) {
            echo "⚠️  تخطي تثبيت المكتبات بسبب أخطاء في المتطلبات\n\n";
            return;
        }
        
        echo "📦 تثبيت مكتبات Composer...\n";
        
        if (!file_exists($this->baseDir . '/vendor')) {
            $output = [];
            $returnCode = 0;
            exec('cd ' . $this->baseDir . ' && composer install --optimize-autoloader --no-dev 2>&1', $output, $returnCode);
            
            if ($returnCode === 0) {
                $this->success[] = "✅ تم تثبيت مكتبات Composer بنجاح";
                echo "   ✅ تم التثبيت بنجاح\n";
            } else {
                $this->errors[] = "❌ فشل تثبيت مكتبات Composer";
                echo "   ❌ فشل التثبيت\n";
            }
        } else {
            echo "   ℹ️  المكتبات مثبتة مسبقاً\n";
        }
        
        echo "\n";
    }

    private function setupEnvironment()
    {
        echo "⚙️  إعداد ملف البيئة (.env)...\n";
        
        $envFile = $this->baseDir . '/.env';
        $envExample = $this->baseDir . '/.env.example';
        
        if (!file_exists($envFile) && file_exists($envExample)) {
            copy($envExample, $envFile);
            echo "   ✅ تم نسخ .env.example إلى .env\n";
        } else if (file_exists($envFile)) {
            echo "   ℹ️  ملف .env موجود مسبقاً\n";
        }
        
        // Generate App Key if not exists
        if (file_exists($envFile)) {
            $envContent = file_get_contents($envFile);
            if (strpos($envContent, 'APP_KEY=base64:') === false || strpos($envContent, 'APP_KEY=') === false) {
                exec('cd ' . $this->baseDir . ' && php artisan key:generate 2>&1', $output);
                echo "   ✅ تم إنشاء مفتاح التطبيق\n";
            } else {
                echo "   ℹ️  مفتاح التطبيق موجود مسبقاً\n";
            }
        }
        
        echo "\n";
    }

    private function setupDatabase()
    {
        echo "🗄️  إعداد قاعدة البيانات...\n";
        
        $dbFile = $this->baseDir . '/database/database.sqlite';
        
        if (!file_exists($dbFile)) {
            touch($dbFile);
            chmod($dbFile, 0666);
            echo "   ✅ تم إنشاء ملف database.sqlite\n";
            $this->success[] = "✅ قاعدة البيانات جاهزة";
        } else {
            echo "   ℹ️  قاعدة البيانات موجودة مسبقاً\n";
        }
        
        echo "\n";
    }

    private function runMigrationsAndSeeders()
    {
        echo "🔄 تشغيل Migrations & Seeders...\n";
        
        // Run Migrations
        exec('cd ' . $this->baseDir . ' && php artisan migrate:fresh --force 2>&1', $output, $returnCode);
        if ($returnCode === 0) {
            echo "   ✅ تم تشغيل Migrations بنجاح\n";
            $this->success[] = "✅ Migrations تمت بنجاح";
        } else {
            echo "   ⚠️  تحذير: مشكلة في Migrations\n";
        }
        
        // Run Currency Seeder
        exec('cd ' . $this->baseDir . ' && php artisan db:seed --class=CurrencySeeder --force 2>&1', $output2, $returnCode2);
        if ($returnCode2 === 0) {
            echo "   ✅ تم إضافة العملات (4 عملات عربية)\n";
        }
        
        // Run Country Seeder
        exec('cd ' . $this->baseDir . ' && php artisan db:seed --class=CountrySeeder --force 2>&1', $output3, $returnCode3);
        if ($returnCode3 === 0) {
            echo "   ✅ تم إضافة الدول (22 دولة عربية)\n";
            $this->success[] = "✅ تم إضافة البيانات الأساسية";
        }
        
        echo "\n";
    }

    private function setupAssets()
    {
        echo "🎨 إعداد الأصول (Assets)...\n";
        
        $publicDir = $this->baseDir . '/public';
        
        if (is_dir($publicDir . '/website') && is_dir($publicDir . '/users-asset')) {
            echo "   ✅ جميع الأصول موجودة\n";
            $this->success[] = "✅ الأصول جاهزة";
        } else {
            echo "   ⚠️  بعض الأصول قد تكون مفقودة\n";
        }
        
        echo "\n";
    }

    private function setPermissions()
    {
        echo "🔐 ضبط الصلاحيات...\n";
        
        $dirs = [
            'storage',
            'storage/app',
            'storage/framework',
            'storage/framework/cache',
            'storage/framework/sessions',
            'storage/framework/views',
            'storage/logs',
            'bootstrap/cache'
        ];
        
        foreach ($dirs as $dir) {
            $fullPath = $this->baseDir . '/' . $dir;
            if (is_dir($fullPath)) {
                chmod($fullPath, 0775);
            }
        }
        
        echo "   ✅ تم ضبط صلاحيات المجلدات\n";
        $this->success[] = "✅ الصلاحيات تمت بنجاح";
        
        echo "\n";
    }

    private function printReport()
    {
        echo "\n";
        echo "╔═══════════════════════════════════════════════════╗\n";
        echo "║              📊 تقرير التثبيت النهائي           ║\n";
        echo "╚═══════════════════════════════════════════════════╝\n\n";
        
        if (!empty($this->errors)) {
            echo "❌ الأخطاء:\n";
            foreach ($this->errors as $error) {
                echo "   $error\n";
            }
            echo "\n";
        }
        
        if (!empty($this->success)) {
            echo "✅ النجاحات:\n";
            foreach ($this->success as $success) {
                echo "   $success\n";
            }
            echo "\n";
        }
        
        if (empty($this->errors)) {
            echo "═══════════════════════════════════════════════════\n";
            echo "🎉 التثبيت اكتمل بنجاح!\n\n";
            echo "لتشغيل المشروع:\n";
            echo "   php artisan serve\n\n";
            echo "ثم افتح المتصفح على:\n";
            echo "   http://localhost:8000\n\n";
            echo "الصفحات المتاحة:\n";
            echo "   http://localhost:8000/ (الرئيسية)\n";
            echo "   http://localhost:8000/login (تسجيل دخول)\n";
            echo "   http://localhost:8000/client/register (تسجيل عميل)\n";
            echo "   http://localhost:8000/creator/register (تسجيل صانع محتوى)\n";
            echo "═══════════════════════════════════════════════════\n";
        } else {
            echo "⚠️  التثبيت اكتمل مع بعض الأخطاء.\n";
            echo "   يرجى حل الأخطاء أعلاه وإعادة المحاولة.\n\n";
        }
    }

    private function commandExists($command)
    {
        $return = shell_exec(sprintf("which %s", escapeshellarg($command)));
        return !empty($return);
    }
}

// Run Installer
$installer = new VidooInstaller();
$installer->run();
