<?php

use App\Validation\Rules\EmailRule;
use App\Validation\Rules\RequiredRule;
use App\Validation\validator;

require_once 'vendor/autoload.php';
$validator = new validator([
    'first_name' => 'ahmed',
    'email' => '',
]);
$validator->setRules([
    'first_name'=>[
    new RequiredRule()
],
    'email'=>[
    new RequiredRule(),
    new EmailRule()
]
]);

$validator->validate();
dump($validator);