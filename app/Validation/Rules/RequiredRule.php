<?php
namespace App\Validation\Rules;

class RequiredRule extends Rule
{
    /**
     * @param string $value
     * @return bool
     */
    public function passes($field,$value)
    {
        return !empty($value);
    }
    /**
     * @return string
     */
    public function message($field)
    {
        return $field . ' is required';
    }
}