<?php

namespace App\Http\Requests\Install;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'app_name' => ['required', 'string'],
            'app_url' => ['required', 'url'],
            'app_timezone' => ['required', 'string'],
        ];
    }
}
