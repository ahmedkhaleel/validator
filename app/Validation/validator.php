<?php

namespace App\Validation;

use App\Validation\Errors\ErrorBag;
use App\Validation\Rules\AhmedRule;
use App\Validation\Rules\BetweenRule;
use App\Validation\Rules\EmailRule;
use App\Validation\Rules\RequiredRule;
use App\Validation\Rules\Rule;

class validator
{


    /**
     * @var array
     */
    protected $rules = [];

    /**
     * @var array
     */
    protected $errors ;

    protected $ruleMap = [
        'required' => RequiredRule::class,
        'email' => EmailRule::class,
        'ahmed' => AhmedRule::class,
        'between' => BetweenRule::class,

    ];

    public function __construct(protected array $data)
    {
        $this->errors = new ErrorBag();
    }

    public function setRules(array $rules)
    {
       $this->rules = $rules;
    }

    public function validate()
    {
        foreach ($this->rules as $field => $rules)
        {

          foreach($this->resolveRules($rules) as $rule)
          {
              $this->validateRule($field,$rule);
          }
        }
        return $this->errors->hasErrors();
    }
    public function resolveRules(array $rules)
    {
        return array_map(function ($rule){
            if(is_string($rule)){
                return $this->getRuleFromString($rule);
            }
            return $rule;
        },$rules);

    }
public function getRuleFromString($rule)
{
    $exploded = explode(':',$rule);
    $rule = $exploded[0];
    $options =explode(',',end($exploded));

    return new $this->ruleMap[$rule](...$options);
}
    protected function validateRule($field,Rule $rule)
    {
        if(!$rule->passes($field, $this->getFieldValue($field,$this->data)))
        {
            $this->errors->add($field, $rule->message($field));
        }

    }

    protected function getFieldValue($field, $data)
    {
        return $data[$field] ?? null;
    }

    /**
     * @return array_keys
     */
    public function getErrors()
    {
        return $this->errors->getErrors();
    }

}
