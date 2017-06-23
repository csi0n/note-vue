<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 6/23/17
 * Time: 1:41 PM
 */

namespace App\Exceptions;


class InvalidCredentialsException extends \Exception
{

    /**
     * InvalidCredentialsException constructor.
     */
    public function __construct()
    {
        $this->message = '账号或密码错误';
    }
}