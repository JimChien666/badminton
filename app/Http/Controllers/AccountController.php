<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AccountService;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Account\LoginRequest;
use App\Http\Requests\Account\RegisterRequest;

class AccountController extends Controller
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
    public function login(LoginRequest $request)
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

    /**
     * 註冊使用者
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        $result = $this->accountService->register($request->all());
        return response()->noContent();
    }

    public function show(Request $request)
    {
        $user = Auth::user();
        return response()->json($user->select(['name', 'email'])->get()->toArray());
    }
}
