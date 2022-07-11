<?php

use App\Validation\Rules\AhmedRule;
use App\Validation\Rules\BetweenRule;
use App\Validation\Rules\EmailRule;
use App\Validation\Rules\RequiredRule;
use App\Validation\validator;

require_once 'vendor/autoload.php';
$validator = new validator([
    'first_name' => 'ahmed ahmed',
]);
$validator->setRules([
    'first_name'=>[
    'required',
    'between:5,10',
],
]);

if(!$validator->validate())
{
   dump($validator->getErrors());
}else{
    dump('Passed!');
}
