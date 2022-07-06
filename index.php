<?php

use App\Validation\validator;

require_once 'vendor/autoload.php';
$validator = new validator([
    'name' => 'Ahmed Khaleel',
    'email' => 'info@ahmed-khaleel.net',
]);
$validator->setRules([
'name' => 'required|min:3',
    'email' => 'required|email',
]);


dump($validator);