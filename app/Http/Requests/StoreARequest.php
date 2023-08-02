<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreARequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'subject' => 'required|max:255',
            'message' => 'required|max:255',
            'file' => 'file|mimes:docx,pdf',
        ];
    }
}
