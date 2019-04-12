<?php

namespace App\Http\Requests\Frontend\Eccomerce;

use Config;
use Illuminate\Foundation\Http\FormRequest;

class PlaceHolderRequest extends FormRequest
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
        $keys = collect(Config::get('core.e-commerce.payment_method'))->pluck('key')->toArray();
        return [
            'blling_address' => 'required',
            'shipping_address' => 'required',
            'payment_method' => 'required|in:' . implode(',', $keys),
        ];
    }
}
