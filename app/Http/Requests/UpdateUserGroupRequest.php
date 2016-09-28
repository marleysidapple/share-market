<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Role;

class UpdateUserGroupRequest extends Request
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
        $role = Role::find($this->route('id'));
       
        return [
            'name'         => 'required|unique:roles,name,'.$role->id,
            'display_name' => 'required',
            'description'  => 'required',
        ];
    }
}
