<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class AddUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name'=>'min:3|max:20|string|required',
            'last_name'=>'min:3|max:20|string|required',
            'email'=>'email:rfc,dns|string|required|unique:users,email',
            'username' => 'required|string|regex:/\w*$/|max:255|unique:users,username',
            'role'=>'required',
            'password'=>['required_with:confirmPassword',Password::min(8)->mixedCase()->numbers()],
            'confirmPassword'=>['same:password',Password::min(8)->mixedCase()->numbers()]
        ];
    }
}
