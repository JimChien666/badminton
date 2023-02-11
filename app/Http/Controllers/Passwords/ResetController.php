<?php

namespace App\Http\Controllers\Passwords;

use App\Http\Controllers\Controller;
use App\Http\Requests\Passwords\ResetRequest;
use App\Services\AccountService;
use App\Services\PasswordService;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class ResetController extends Controller
{
    public function __construct(
        private AccountService $accountService,
        private PasswordService $passwordService
    ) {
    }

    /**
     * 重設密碼
     * @param ResetRequest $request
     */
    public function __invoke(ResetRequest $request)
    {
        $email = $request->input('email');
        if (!$this->accountService->checkEmailExist($email)) {
            throw new NotFoundResourceException();
        }
        $token = $this->passwordService->generateForgetPasswordCode($email);
        Mail::to('shit1875678@gmail.com')->send(new \App\Mail\ForgotPasswordMail($token));
        return response()->noContent();
    }
}
