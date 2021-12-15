<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
        $user = $this->route('user');
        return [
            'name' => ['required', 'string', 'max:255'],
            'family' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => ['nullable', 'numeric', Rule::unique('users')->ignore($user->id)],
            'nati_code' => ['required', 'numeric', Rule::unique('users')->ignore($user->id)],
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
