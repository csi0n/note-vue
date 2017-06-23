<?php

namespace App\Http\Controllers;

use App\Services\ApiResponseService;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    /**
     * UserController constructor.
     * @param $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function my()
    {
        $user = $this->userService->my();
        return ApiResponseService::success(compact('user'));
    }
}
