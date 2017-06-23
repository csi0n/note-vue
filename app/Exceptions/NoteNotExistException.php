<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 6/23/17
 * Time: 2:18 PM
 */

namespace App\Exceptions;


class NoteNotExistException extends \Exception
{

    /**
     * NoteNotExistException constructor.
     */
    public function __construct()
    {
        $this->message = '笔记不存在';
    }
}