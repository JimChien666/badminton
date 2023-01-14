<?php

namespace App\Http\Requests\Account;

use App\Constant\Regex;
use App\Rules\EmailRule;
use App\Http\Requests\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:255'
            ],
        ];
    }
}
