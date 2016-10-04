<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CustomerRequest extends Request
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
            'name'                 => 'required',
            'email'                => 'required',
            'gender'               => 'required',
            'dateofbirth'          => 'required',
            'fathername'           => 'required',
            'mothername'           => 'required',
            'permanentaddress'     => 'required',
            'temporaryaddress'     => 'required',
            'mobile'               => 'required',
            'citizenshipno'        => 'required',
            'customer.*.bank'      => 'required',
            'customer.*.accountno' => 'required',
            'maritalstatus'        => 'required',
            'occupation'           => 'required',
            'username'             => 'required|unique:users,username',
            'password'             => 'required|min:8',
            'multiple'             => 'required',
        ];
    }

    public function messages()
    {
        return [
            'customer.*.bank.required'      => 'Bank field is required',
            'customer.*.accountno.required' => 'Account no. field is required',
        ];
    }
}
