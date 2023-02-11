<?php

namespace App\Services;

use App\Models\PasswordReset;
use App\Repositories\PasswordResetRepository;
use Illuminate\Support\Str;

class PasswordService
{
    public function __construct(private PasswordResetRepository $userRepository)
    {
    }
    public function generateForgetPasswordCode(string $email): string
    {
        $token = Str::padLeft((string)rand(0, 99999999), 8, '0');
        $passwordReset = new PasswordReset();
        $passwordReset->token = $token;
        $passwordReset->email = $email;
        $passwordReset->created_at = now();
        $passwordReset->save();
        return $token;
    }
}
