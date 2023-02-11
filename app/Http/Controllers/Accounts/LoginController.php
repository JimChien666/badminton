<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Accounts\LoginRequest;
use App\Services\AccountService;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{

    public function __construct(
        private AccountService $accountService
    ) {
    }

    /**
     * 登入取得Token
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function __invoke(LoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $token = $this->accountService->login($email, $password);

        if ($token !== false) {
            $result = [
                'token_type' => 'Bearer',
                'access_token' => $token,
                'expires_in' => auth('api')->factory()->getTTL() * 60
            ];
        }

        return response()->json($result);
    }
}
