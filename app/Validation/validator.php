<?php

namespace App\Validation;

class validator
{




    public function __construct(protected array $data)
    {

    }

    public function setRules(array $rules)
    {
       $this->rules = $rules;
    }
}