<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'file'=> ['nullable'],
            'first_name'=> ['string', 'required', 'max:255'],
            'last_name'=> ['string', 'required','max:255'],
            'email'=> ['string', 'required','email'],
            'phone'=> ['string', 'required'],
            'bank_account_number'=> ['numeric', 'required'],
            'about'=> ['string', 'max:255'],
        ];
    }
}
