<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'first_name' => ['required', 'max:255', 'string'],
            'last_name' => ['required', 'max:255', 'string'],
            'email' => ['required', 'email'], // Đã loại bỏ tab thừa
            'phone' => ['required', 'string'],
            'bank_account_number' => ['required'], // Đảm bảo số tài khoản hợp lệ
            'about' => ['required', 'string', 'max:300']
        ];
    }
}
