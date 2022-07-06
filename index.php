<?php

use App\Validation\Rules\RequiredRule;
use App\Validation\validator;

require_once 'vendor/autoload.php';
$validator = new validator([
    'name' => 'ahmed khaleel ',
    'email' => 'info@ahmed-khaleel.net',
]);
$validator->setRules([
'name'=>[
    new RequiredRule()
]
]);

$validator->validate();
