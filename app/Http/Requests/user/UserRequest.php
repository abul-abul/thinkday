<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'password_confirmation' => 'same:password'
        ];
    }

    public function inputs()
    {
        $inputs = $this->except('_token');
        if(!$inputs['password']){
            unset($inputs['password']);
        }else{
            $inputs['password'] = bcrypt($inputs['password']);
        }
        return $inputs;
    }
}
