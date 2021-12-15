<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'family' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['nullable', 'numeric','unique:users,phone'],
            'nati_code' => ['required', 'numeric','unique:users,nati_code'],
            'role' => ['required'],
            'password' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'پر کردن فیلد نام ضروری می باشد',
            'name.max' => 'حداکثر مقدار مجاز 255 کاراکتر می باشد',
            'family.required' => 'پر کردن فیلد نام خانوادگی ضروری می باشد',
            'family.max' => 'حداکثر مقدار مجاز 255 کاراکتر می باشد',
            'email.required' => 'پر کردن فیلد ایمیل ضروری می باشد',
            'email.email' => 'ایمیل نامعتبر است',
            'email.max' => 'حداکثر مقدار مجاز 255 کاراکتر می باشد',
            'email.unique' => 'ایمیل قبلا وجود دارد',
            'phone.numeric' => 'از کاراکتر های عددی استفاده کنید',
            'phone.unique' => 'شماره موبایل قبلا وجود دارد',
            'nati_code.required' => 'پر کردن فیلد کدملی ضروری می باشد',
            'nati_code.numeric' => 'از کاراکتر های عددی استفاده کنید',
            'nati_code.unique' => 'کد ملی قبلا وجود دارد',
            'role.required' => 'پر کردن فیلد نقش ضروری می باشد',
            'password.max' => 'حداکثر مقدار مجاز 255 کاراکتر می باشد',
        ];
    }

}
