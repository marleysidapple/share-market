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
            'gender'               => 'required',
            'profilephoto'         => 'mimes:jpg,jpeg,png',
            
            'zone'                 => 'required',
            'district'             => 'required',
            'vdc_municipality'     => 'required',
            'ward'                 => 'required',
            'street'               => 'required',
            
            'citizenshipno'        => 'required',
            'issuedate'            => 'required',
            'issuedistrict'        => 'required',
            'scancitizenshipcopy'  => 'required|mimes:jpg,jpeg,png',
        ];
    }

    public function messages()
    {
        return [
           /* 'customer.*.bank.required'      => 'Bank field is required',
            'customer.*.branch.required'    => 'Branch field is required',
            'customer.*.accountno.required' => 'Account no. field is required',
            'customer.*.accname.required'   => 'Account name is required',
            'tzone.required'                => 'Zone is required',
            'tdistrict.required'            => 'District is required',
            'tvdc_municipality.required'    => 'VDC/Municipality is required',*/
        ];
    }
}
