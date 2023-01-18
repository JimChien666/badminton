<?php

namespace App\Http\Requests\Account;

use App\Constant\Regex;
use App\Http\Requests\FormRequest;
use App\Rules\EmailRule;

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
            'cellphone' => [
                'required',
                "regex:" . Regex::CELLPHONE
            ],
            'name' => [
                'required',
                'string',
                'max:255'
            ],
        ];
    }
}
