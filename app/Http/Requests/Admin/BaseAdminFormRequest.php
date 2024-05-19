<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseAdminFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
}
