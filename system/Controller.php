<?php 

namespace System;

abstract class Controller
{
    protected $routeParams = [];

    public function __construct(Array $routeParams)
    {
        $this->routeParams = $routeParams;
    }


    public function __call($method, $arguments)
    {
        if(method_exists($this, $method))
        {
            call_user_func_array([$this, $method],$arguments);
        }
        else
        {
            throw new \Exception("Method $method not found in controller " . get_class($this));
        }
    }


    public function validateInput()
    {
        $validate = true;

        foreach($_REQUEST as $key => $value)
        {
            if(empty(trim($value)))
            {
                setError("Input empty for " . $key);
                $validate = false;
            }
        }
        return $validate;
    }
}