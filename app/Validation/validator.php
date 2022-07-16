<?php

namespace App\Validation;

use App\Validation\Errors\ErrorBag;
use App\Validation\Rules\AhmedRule;
use App\Validation\Rules\BetweenRule;
use App\Validation\Rules\EmailRule;
use App\Validation\Rules\RequiredRule;
use App\Validation\Rules\Rule;
use App\Validation\RuleMap;

class validator
{


    /**
     * @var array
     */
    protected $rules = [];

    /**
     * @var array
     */
    protected $errors;
    public static function alias($field)
    {
        return self::$aliases[$field] ?? $field;
    }


    protected function newRuleFromMap($rule, $options)
    {
        return RuleMap::resolve($rule, $options);
    }
//    protected $ruleMap = [
//        'required' => RequiredRule::class,
//        'email' => EmailRule::class,
//        'ahmed' => AhmedRule::class,
//        'between' => BetweenRule::class,
//    ];

    public function __construct(protected array $data)
    {
        $this->errors = new ErrorBag();
    }

    public function setRules(array $rules)
    {
        $this->rules = $rules;
    }

    /**
     * @return bool
     */

    public function validate()
    {
        foreach ($this->rules as $field => $rules) {

            foreach ($this->resolveRules($rules) as $rule) {
                $this->validateRule($field, $rule);
            }
        }
        return $this->errors->hasErrors();
    }

    /**
     * @param array $rules
     * @return Rule[]|array
     */

    public function resolveRules(array $rules)
    {
        return array_map(function ($rule) {
            if (is_string($rule)) {
                return $this->getRuleFromString($rule);
            }
            return $rule;
        }, $rules);

    }

    /**
     * @param $rule
     * @return Rule
     */
    public function getRuleFromString($rule)
    {

        return $this->newRuleFromMap(
            ($exploded = explode(':', $rule))[0],
            explode(',', end($exploded))
        );

    }

    /**
     * @param $field
     * @param Rule $rule
     * @return void
     */
    protected function validateRule($field, Rule $rule)
    {
        if (!$rule->passes($field, $this->getFieldValue($field, $this->data),$this->data)) {

            $this->errors->add($field, $rule->message(self::alias($field)));
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

    protected static $aliases =[];
    /**
     * @param array $aliases
     * @return void
     */
    public function setAliases(array  $aliases)
    {
       return self::$aliases = $aliases;
    }

public static function aliases(array $fields)
    {
        return array_map(function(){
            return self::alias($field);
        },$fields);
    }
}
