<?php

namespace App\Http\Controllers\Install;

use App\Http\Controllers\Controller;
use App\Http\Requests\Install\AdminAccountRequest;
use App\Http\Requests\Install\DatabaseRequest;
use App\Http\Requests\Install\SettingsRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class InstallController extends Controller
{
    public function requirements(): View
    {
        $extensions = [
            'pdo',
            'pdo_mysql',
            'mbstring',
            'openssl',
            'tokenizer',
            'json',
            'xml',
            'ctype',
            'fileinfo',
        ];

        $checks = collect($extensions)->mapWithKeys(function (string $extension) {
            return [$extension => extension_loaded($extension)];
        });

        $permissions = [
            'storage' => is_writable(storage_path()),
            'bootstrap/cache' => is_writable(base_path('bootstrap/cache')),
        ];

        return view('install.requirements', [
            'checks' => $checks,
            'permissions' => $permissions,
        ]);
    }

    public function requirementsSubmit(): RedirectResponse
    {
        return redirect()->route('install.database');
    }

    public function database(): View
    {
        return view('install.database');
    }

    public function databaseSubmit(DatabaseRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $this->updateEnv([
            'DB_HOST' => $data['db_host'],
            'DB_PORT' => $data['db_port'],
            'DB_DATABASE' => $data['db_name'],
            'DB_USERNAME' => $data['db_user'],
            'DB_PASSWORD' => $data['db_pass'],
        ]);

        return redirect()->route('install.settings');
    }

    public function settings(): View
    {
        return view('install.settings');
    }

    public function settingsSubmit(SettingsRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $this->updateEnv([
            'APP_NAME' => $data['app_name'],
            'APP_URL' => $data['app_url'],
            'APP_TIMEZONE' => $data['app_timezone'],
        ]);

        return redirect()->route('install.admin');
    }

    public function admin(): View
    {
        return view('install.admin');
    }

    public function adminSubmit(AdminAccountRequest $request): RedirectResponse
    {
        $data = $request->validated();
        session(['install.admin' => $data]);

        return redirect()->route('install.migrate');
    }

    public function migrate(): View
    {
        return view('install.migrate');
    }

    public function migrateSubmit(Request $request): RedirectResponse
    {
        Artisan::call('migrate', ['--force' => true]);
        Artisan::call('db:seed', ['--force' => true]);

        $adminData = session('install.admin');

        if ($adminData) {
            User::updateOrCreate(
                ['email' => $adminData['email']],
                [
                    'name' => $adminData['name'],
                    'password' => Hash::make($adminData['password']),
                    'role' => 'admin',
                    'status' => 'active',
                ]
            );
        }

        Storage::disk('local')->put('installed.lock', now()->toDateTimeString());

        return redirect()->route('install.finish');
    }

    public function finish(): View
    {
        return view('install.finish');
    }

    private function updateEnv(array $data): void
    {
        $envPath = base_path('.env');
        $env = file_exists($envPath) ? file_get_contents($envPath) : '';

        foreach ($data as $key => $value) {
            $pattern = "/^{$key}=.*$/m";
            $line = $key.'="'.$value.'"';

            if (preg_match($pattern, $env)) {
                $env = preg_replace($pattern, $line, $env);
            } else {
                $env .= PHP_EOL.$line;
            }
        }

        file_put_contents($envPath, trim($env).PHP_EOL);
    }
}
