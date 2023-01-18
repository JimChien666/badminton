<?php

namespace App\Http\Controllers\Password;

use App\Http\Controllers\Controller;
use App\Services\AccountService;

class UpdateController extends Controller
{
    public function __construct(
        private AccountService $accountService
    ) {
    }

    /**
     * 更新密碼
     * @param ResetRequest $request
     */
    public function __invoke(ResetRequest $request)
    {
    }
}
