<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
        return [
             'email'=>'required|email|unique:users,email,'.$this->id.',id',
             'full'=>'required|min:4',
             'phone'=>'required|min:7|unique:users,phone,'.$this->id.',id',
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Email không được để trống!',
            'email.email'=>'Email không đúng định dạng!',
            'email.unique'=>'Email Không được trùng!',
            'full.required'=>'Họ tên không được để trống',
            'full.min'=>'Họ tên không nhỏ hơn 4 kí tự',
            'phone.required'=>'Số điện thoại không được để trống!',
            'phone.min'=>'Số điện thoại không được nhỏ hơn 5 kí tự',
            'phone.unique'=>'Số điện thoại Không được trùng!',
        ];
    }

}
