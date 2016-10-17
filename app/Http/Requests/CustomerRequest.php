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
            'mobile'               => 'required',
            'profilephoto'         => 'required|mimes:jpg,jpeg,png',
            'zone'                 => 'required',
            'district'             => 'required',
            'vdc_municipality'     => 'required',
            'tzone'                => 'required',
            'tdistrict'            => 'required',
            'tvdc_municipality'    => 'required',
            'issuedistrict'        => 'required',
            'issuedate'            => 'required',
            'scancitizenshipcopy'  => 'required|mimes:jpg,jpeg,png',
            'citizenshipno'        => 'required',
            'customer.*.bank'      => 'required',
            'customer.*.branch'    => 'required',
            'customer.*.accountno' => 'required',
            'organisation'         => 'required',
            'designation'          => 'required',
            'address'              => 'required',
            'contact'              => 'required',
            'password'             => 'required',
        ];
    }

    public function messages()
    {
        return [
            'customer.*.bank.required'      => 'Bank field is required',
            'customer.*.branch.required'    => 'Branch field is required',
            'customer.*.accountno.required' => 'Account no. field is required',
            'tzone.required'                => 'Zone is required',
            'tdistrict.required'            => 'District is required',
            'tvdc_municipality'             => 'VDC/Municipality is required',
        ];
    }
}
