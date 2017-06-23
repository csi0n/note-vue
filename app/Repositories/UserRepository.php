<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 6/23/17
 * Time: 1:32 PM
 */

namespace App\Repositories;


use App\User;

class UserRepository extends Repository
{
    public function setModel()
    {
        return User::class;
    }
}