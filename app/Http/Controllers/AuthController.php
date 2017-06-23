<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Services\ApiResponseService;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected $authService;

    /**
     * AuthController constructor.
     * @param $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(Request $request)
    {
        try {
            $token = $this->authService->login($request);
            return ApiResponseService::success(compact('token'));
        } catch (\Exception $exception) {
            return ApiResponseService::fail($exception->getMessage());
        }
    }

    public function register(Request $request)
    {
        if ($token = $this->authService->register($request))
            return ApiResponseService::success(compact('token'));
        return ApiResponseService::fail();
    }

}
