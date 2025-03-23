<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool   //có cho phép thực hiện request hay không
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array  // quy tắc : các điều kiện đầu vào
    {
        return [
            'name' => ['required', 'max:20', 'min:5'],
            'email' => ['required', 'email','unique:contacts,email'],
            'subject' => ['required','min : 10'],
            'message' => [''],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.max' => 'Tên không được quá 20 ký tự',
            'name.min' => 'Tên không được dưới 5 ký tự',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'subject.required' => 'Chủ đề không được để trống',
            'subject.min' => 'Chủ đề không được dưới 10 ký tự',
        ];
    }
}
