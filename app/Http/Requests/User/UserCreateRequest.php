<?php


namespace App\Http\Requests\User;


use Urameshibr\Requests\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|between:4,50',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|between:6,255',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [

        ];
    }

}
