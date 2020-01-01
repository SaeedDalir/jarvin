<?php


namespace App\Http\Requests\User;


use Urameshibr\Requests\FormRequest;

class UserUpdateRequest extends FormRequest
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
