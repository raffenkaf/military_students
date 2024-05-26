<?php

namespace App\Http\Requests\Admin;

class StoreAuthRightRequest extends BaseAdminFormRequest
{
    public function rules(): array
    {
        return [
            'access_type' => 'required|integer',
            'access_details' => 'nullable',
        ];
    }
}
