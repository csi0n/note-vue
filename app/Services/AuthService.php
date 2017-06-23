<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 6/23/17
 * Time: 1:34 PM
 */

namespace App\Services;

use App\Exceptions\InvalidCredentialsException;
use App\Http\Requests\Request;
use App\Repositories\UserRepository;
use JWTAuth;

class AuthService
{
    protected $userRepository;

    /**
     * UserService constructor.
     * @param $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (!$token = \JWTAuth::attempt($credentials)) {
            throw new InvalidCredentialsException();
        }

        return $token;
    }

    public function register(Request $request)
    {
        $result = $this->userRepository->fill($request->all())->save();
        if ($result) {
            $token = JWTAuth::fromUser($this->userRepository->getModel());
            return $token;
        }
        return false;
    }
}
