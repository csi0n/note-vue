<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 6/23/17
 * Time: 1:30 PM
 */

namespace App\Repositories;


abstract class Repository
{
    protected $model;

    /**
     * Repository constructor.
     */
    public function __construct()
    {
        $this->model = app($this->setModel());
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    public abstract function setModel();

    public function __call($name, $arguments)
    {
        return call_user_func_array([$this->getModel(), $name], $arguments);
    }

}