<?php

namespace App\Validation;

use App\Validation\Rules\Rule;

class validator
{

    public function __construct(protected array $data)
    {

    }

    public function setRules(array $rules)
    {
       $this->rules = $rules;
    }

    public function validate()
    {
        foreach ($this->rules as $field => $rules)
        {
          foreach($rules as $rule)
          {
              $this->validateRule($field,$rule);
          }
        }
    }

    protected function validateRule($field,Rule $rule)
    {
        if(!$rule->passes($field, $this->getFieldValue($field,$this->data)))
        {
            dump($rule->message($field));
        }
    }

    protected function getFieldValue($field, $data)
    {
        return $data[$field] ?? null;
    }


}