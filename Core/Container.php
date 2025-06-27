<?php

namespace Core;

class Container
{
    protected $bindings = [];

    //Add
    public function bind(string $key, callable $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    //Remove
    public function resolve(string $key)
    {
        if (!isset($this->bindings[$key])) {
            throw new Exception("No binding found for key: {$key}");
        }
        return call_user_func($this->bindings[$key]);
    }
}