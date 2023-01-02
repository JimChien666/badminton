<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Arr;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class AccountService
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function login(string $email, string $password)
    {
        /* @var $user User */
        $user = $this->userRepository->searchUserByEmail($email);

        // 密碼不符
        if (! Hash::check($password, $user->password)) {
            // TODO error handler
            dd('password not matched');
        }

        return JWTAuth::fromUser($user);
    }

    public function register(array $data)
    {
        $name = Arr::get($data, 'name');
        $email = Arr::get($data, 'email');
        $password = Arr::get($data, 'password');
        $user = $this->userRepository->registerAccount($name, $email, $password);

        return $user;
    }
}
