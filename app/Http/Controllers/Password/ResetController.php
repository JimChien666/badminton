<?php

namespace App\Http\Controllers\Password;

use App\Http\Controllers\Controller;
use App\Services\AccountService;

class ResetController extends Controller
{
    public function __construct(
        private AccountService $accountService
    ) {
    }

    /**
     * 重設密碼
     * @param ResetRequest $request
     */
    public function __invoke(ResetRequest $request)
    {
    }
}
