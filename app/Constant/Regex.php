<?php

namespace App\Constant;

class Regex
{
    /**
     * 6 - 12 位的英數字混合
     */
    public const PASSWORD = '/^(?=.*\d)(?=.*[a-zA-Z])[a-zA-Z0-9]{6,12}$/';

    public const CELLPHONE = '/^09\d{8}$/';
}
