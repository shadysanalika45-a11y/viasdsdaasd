<?php

namespace App\Http\Requests\Install;

use Illuminate\Foundation\Http\FormRequest;

class DatabaseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'db_host' => ['required', 'string'],
            'db_port' => ['required', 'numeric'],
            'db_name' => ['required', 'string'],
            'db_user' => ['required', 'string'],
            'db_pass' => ['nullable', 'string'],
        ];
    }
}
