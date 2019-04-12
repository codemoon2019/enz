<?php

namespace App\Http\Requests\Backend\Auth\Role;

use App\Models\Auth\Role;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreRoleRequest.
 */
class StoreRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdminOrSystem();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $tableName = (new Role)->getTable();
        return [
            'name' => "required|unique:$tableName|max:191",
        ];
    }
}
