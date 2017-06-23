<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 6/23/17
 * Time: 1:51 PM
 */

namespace App\Services;


use App\Repositories\UserRepository;

class UserService
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

    public function my()
    {
        return user();
    }
}