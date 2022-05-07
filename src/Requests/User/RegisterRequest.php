<?php


namespace SoleX\Blog\Requests\User;


use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email'    => 'bail|required|email|unique:users,email',
            'password' => 'bail|required|min:5|confirmed',
        ];
    }
}
