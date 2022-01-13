<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'password' => 'required',

            'newpassword' => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[!-\/:-@\[-`{-~]/|different: password',

            'con-password' => 'required_with:newpassword|same:newpassword|min:6'



        ];
    }


}
