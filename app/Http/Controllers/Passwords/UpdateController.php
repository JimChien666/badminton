<?php

namespace App\Http\Controllers\Passwords;

use App\Http\Controllers\Controller;
use App\Http\Requests\Passwords\UpdateRequest;
use App\Services\AccountService;

class UpdateController extends Controller
{
    public function __construct(
        private AccountService $accountService
    ) {
    }

    /**
     * 更新密碼
     * @param UpdateRequest $request
     */
    public function __invoke(UpdateRequest $request)
    {
    }
}
