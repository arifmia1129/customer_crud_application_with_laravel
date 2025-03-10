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
            'image'=> ['nullable', 'image', 'max:3000'],
            'first_name'=> ['string', 'required', 'max:255'],
            'last_name'=> ['string', 'required','max:255'],
            'email'=> ['string', 'required','email'],
            'phone'=> ['string', 'required'],
            'bank_account_number'=> ['string', 'required'],
            'about'=> ['string', 'max:255'],
        ];
    }
}
