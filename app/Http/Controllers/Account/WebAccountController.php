<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Services\AccountService;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WebAccountController extends Controller
{

    public function __construct(
        private AccountService $accountService
    ) {
    }

    /**
     * 登入取得Token
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
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

        return view('account/loginSuccess');
    }

    /**
     * 註冊使用者
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request)
    {
        $result = $this->accountService->register($request->all());
        return view('account/login');
    }

    public function show(Request $request)
    {

        dd(Auth::user());
        $user = JWTAuth::toUser($token);
        dd($user);
        // return response()->json($result);
    }
}
