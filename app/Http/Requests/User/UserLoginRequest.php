<?php


namespace App\Http\Requests\User;


use Urameshibr\Requests\FormRequest;

class UserLoginRequest extends FormRequest
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
            'email' => 'required|email',
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
