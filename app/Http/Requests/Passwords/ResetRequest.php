<?php

namespace App\Http\Requests\Passwords;

use App\Http\Requests\FormRequest;
use App\Rules\EmailRule;

class ResetRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => [
                'required',
                new EmailRule()
            ]
        ];
    }
}
