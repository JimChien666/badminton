<?php

namespace App\Http\Requests\Account;

use App\Constant\Regex;
use App\Http\Requests\FormRequest;
use App\Rules\EmailRule;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => [
                'required',
                new EmailRule()
            ],
            'password' => [
                'required',
                "regex:" . Regex::PASSWORD
            ],
        ];
    }
}
