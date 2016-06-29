<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'txtFirstname' => 'required|unique:users,username',
            'txtPassword' => 'required', 
            'txtRe_Password' => 'required|same:txtPassword',
            'txtEmail' => 'required'
        ];
    }

    public function messages(){
        return [
            'txtFirstname.required' => ' Chưa nhập tên',
            'txtFirstname.unique' => 'Tên Username bị trùng',
            'txtPassword.required'=> 'Chưa nhập txtPassword',
            'txtRe_Password.required'=> 'Chưa nhập txtRe_Password',
            'txtRe_Password.same'=> 'không trùng txtPassword',
            'txtEmail.required' => 'Chưa nhập txtEmail'
        ];
    }
}
