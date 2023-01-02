<?php

namespace App\Repositories;

use Exception;
use App\Models\User;
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
     * @return mixed
     */
    public function registerAccount(string $name, string $email, string $password)
    {
        try {
            return User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ]);
        } catch (Exception $e) {
            dd($e);
        }
    }
}
