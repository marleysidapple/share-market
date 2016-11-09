<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Customer;

class UpdateContactInfoRequest extends Request
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
        $customer = Customer::find($this->route('id'));
        return [
            'email'        => 'email|unique:users,email,'.$customer->user_id,
        ];
    }
}
