<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'address'=>'min:5|max:50|string|required',
            'city'=>'min:5|max:50|string|required',
            'postal_code'=>'min:3|max:6|string|required',
            'password'=>['required_with:confirmPassword',Password::min(8)->mixedCase()->numbers()],
            'confirmPassword'=>['same:password',Password::min(8)->mixedCase()->numbers()]
        ];
    }
}
