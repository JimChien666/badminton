<?php

namespace App\Repositories;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    /**
     * 透過信箱搜尋特定使用者
     *
     * @param string $email 信箱
     * @return mixed
     */
    public function searchUserByEmail(string $email)
    {
        try {
            return User::select(['*'])
                ->where('email', $email)
                ->first();
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * 建立使用者
     *
     * @param string $name 姓名
     * @param string $email 信箱
     * @param string $password 密碼
     * @param string $cellphone 手機
     * @return mixed
     */
    public function registerAccount(string $name, string $email, string $password, string $cellphone)
    {
        try {
            return User::create([
                'name' => $name,
                'email' => $email,
                'cellphone' => $cellphone,
                'password' => Hash::make($password),
            ]);
        } catch (Exception $e) {
            dd($e);
        }
    }
}
