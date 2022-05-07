<?php


namespace SoleX\Blog\Requests\User;


use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email'    => 'bail|required|email|exists:users,email',
            'password' => 'bail|required|min:5',
        ];
    }
}
