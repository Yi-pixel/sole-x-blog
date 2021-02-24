<?php


namespace SoleX\Blog\App\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email'    => 'bail|required|email|unique:users,email',
            'password' => 'bail|required|min:5|confirmed',
        ];
    }
}