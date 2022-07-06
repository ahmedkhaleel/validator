<?php

namespace App\Validation\Errors;

class ErrorBag
{
    /**
     * @var array
     */
    protected $errors = [];

    /**
     * @param $key
     * @param $value
     * @return void
     */
    public function add($key, $value)
    {
        $this->errors[$key] []= $value;
    }

}