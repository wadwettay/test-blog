<?php

namespace App\Http\Requests;

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
            'email' => 'sometimes|required|string|email|max:32|unique:users',
            'password' => 'sometimes|required|string|min:8|confirmed',
            'nickname' => 'required|string|max:32',
            'name' => 'required|string|max:32',
            'surname' => 'required|string|max:32',
            'avatar' => 'image|max:1000',
            'phone' => 'required|regex:/^\+?([0-9]{2,3})-?([0-9]{2,3})-?([0-9]{6,7})$/',
            'sex' => 'required|in:male,female',
            'consent_to_receive_email' => 'sometimes|required',
        ];
    }
}
