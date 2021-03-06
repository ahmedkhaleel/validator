<?php
namespace App\Validation;

use App\Validation\Rules\AhmedRule;
use App\Validation\Rules\BetweenRule;
use App\Validation\Rules\EmailRule;
use App\Validation\Rules\RequiredRule;
use App\Validation\Rules\RequiredWithRule;


class RuleMap {
    /**
     * @var string[]
     */
    protected static $map = [
        'required' => RequiredRule::class,
        'email' => EmailRule::class,
        'ahmed' => AhmedRule::class,
        'between' => BetweenRule::class,
        'required_with' => RequiredWithRule::class,
    ];

    /**
     * @param $rule
     * @param $options
     * @return mixed
     */
    public static function resolve($rule ,$options ){
        return new static::$map[$rule](...$options);
    }
}