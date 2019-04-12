<?php

namespace App\Http\Requests\Frontend\Eccomerce;

use Illuminate\Foundation\Http\FormRequest;

class BillingAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'nullable|string|min:2|max:200',
            'full_name' => 'required|string|min:2|max:200',
            'email' => 'required|email|min:2|max:200',
            'contact' => 'required|string|min:2|max:200',
            'company' => 'nullable|string|min:2|max:200',
            'address' => 'required|string|min:2|max:200',
            'city' => 'required|string|min:2|max:200',
            'postal' => 'required|string|min:2|max:200',
            'type' => 'required|string|in:billing,shipping',
        ];
    }
}
