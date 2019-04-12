<?php

namespace App\Http\Requests\Frontend\Contact;

use Illuminate\Foundation\Http\FormRequest;
use Arcanedev\NoCaptcha\Rules\CaptchaRule;

/**
 * Class SendContactRequest.
 */
class SendContactRequest extends FormRequest
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
        $rules = [

            'full_name'           => 'required|max:255',
            
            'email'                => 'required|email|max:255',
            
            'contact'              => 'max:255',
            
            'postcode'              => 'required',
            
            'message'              => 'required|max:255',
            
            // 'g-recaptcha-response' => 'required|captcha'
        
        ];
        
        return $rules;
    }

    /**
     * Get the validation custom messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
        ];
    }
}
