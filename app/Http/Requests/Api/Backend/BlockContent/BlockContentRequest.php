<?php

namespace App\Http\Requests\Api\Backend\BlockContent;

use Illuminate\Foundation\Http\FormRequest;

class BlockContentRequest extends FormRequest
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
            'fields.title' => 'required',
            'fields.body' => 'required'
        ];
    }
}
