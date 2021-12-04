<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:511'],
            'start_at' => ['required_with:end_at|string'],
            'end_at' => ['required_with:start_at|gt:start_at|string'],
        ];
    }
}
