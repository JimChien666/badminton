<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Accounts\RegisterRequest;
use App\Services\AccountService;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterController extends Controller
{

    public function __construct(
        private AccountService $accountService
    ) {
    }

    /**
     * 註冊使用者
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function __invoke(RegisterRequest $request)
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
