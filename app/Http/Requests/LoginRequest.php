<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginRequest extends Request
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
    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required',

        ];
    }

    public function messages(){
        return [
            'email.required' => ' Chưa nhập tên',

            'password.required'=> 'Chưa nhập Password',

        ];
    }
}
