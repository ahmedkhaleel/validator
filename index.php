<?php

use App\Validation\Rules\AhmedRule;
use App\Validation\Rules\BetweenRule;
use App\Validation\Rules\EmailRule;
use App\Validation\Rules\RequiredRule;
use App\Validation\validator;

require_once 'vendor/autoload.php';
$validator = new validator([
    'first_name' => '',
    'middle_name' => 'dsds',
    'last_name' => 'mmm',
]);
$validator->setAliases([
    'first_name' => 'First Name',
    'middle_name' => 'Middle Name',
    'last_name' => 'Last Name',

]);
$validator->setRules([
    'first_name' => [
        'required',
        'required_with:last_name,middle_name',
    ],

    'last_name' => [
        'required',
    ],

]);

if (!$validator->validate()) {
    dump($validator->getErrors());
} else {
    dump('Passed!');
}
