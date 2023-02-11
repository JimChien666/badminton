<?php

namespace App\Services;

use App\Exceptions\Http\register\ResourceConflictException;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

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
        if (!Hash::check($password, $user->password)) {
            dd('password not matched');
        }

        return JWTAuth::fromUser($user);
    }

    public function register(array $data)
    {
        $name = Arr::get($data, 'name');
        $email = Arr::get($data, 'email');
        $password = Arr::get($data, 'password');
        $cellphone = Arr::get($data, 'cellphone');
        $isEmailExist = $this->checkEmailExist($email);
        if ($isEmailExist) {
            throw new ResourceConflictException();
        }
        $user = $this->userRepository->registerAccount($name, $email, $password, $cellphone);

        return $user;
    }

    public function checkEmailExist(string $email): bool
    {
        return User::where('email', $email)->first() !== null;
    }
}
