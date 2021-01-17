<?php

namespace App\Models;


/**
 * Class Container
 * @package App\Models
 */
class Container
{
    /**
     * @var array
     */
    protected $bindings = [];

    /**
     * @param $key
     * @param $value
     */
    public function bind($key, $value): void
    {
        $this->bindings[$key] = $value;
    }

    /**
     * @param $key
     * @return false|mixed|null
     */
    public function resolve($key)
    {
        if (isset($this->bindings[$key])) {
            return call_user_func($this->bindings[$key]);
        }
        return null;
    }
}
