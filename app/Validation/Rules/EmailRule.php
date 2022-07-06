<?php
namespace App\Validation\Rules;

class EmailRule extends Rule
{
    /**
     * @param string $value
     * @return bool
     */
    public function passes($field,$value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
    /**
     * @return string
     */
    public function message($field)
    {
        return $field . ' must be a valid email';
    }
}