<?php

namespace App\Http\Requests;

use App\Rules\Manager;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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


    public function message()
    {
        return array_merge(parent::messages(), [
            'phone' => 'Incorrect phone format (e.g. +38(000)00xx000)',

        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'full_name' => ['required', 'min:2', 'max:256'],
            'profession_id' => ['required'],
            "employment_date" => ['required', 'date'],
            'phone' => ['required', 'string', 'max:17', 'unique:users'],
            'email' => ['required', 'string', 'email','max:255', 'unique:users'],
            'salary' => ['required','numeric','between:0.00,500000.00'],
            'manager_id' => ['required', 'string',new Manager()],
            'photo'=>['required','mimes:jpeg,png,jpg','max:5000','dimensions:min_width=300,min_height=300'],
        ];
    }

}
