<?php

namespace App\Validation\Rules;

abstract class Rule
{
    /**
     * @param string $value
     * @return bool
     */
    abstract public function passes($field,$value,$data);
    /**
     * @return string
     */
    abstract public function message($field);
}