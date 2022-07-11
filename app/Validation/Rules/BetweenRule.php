<?php
namespace App\Validation\Rules;

class BetweenRule extends Rule
{
    /**
     * @param $lower
     * @param $upper
     */
    public function __construct(public $lower , public $upper)
    {

    }

    /**
     * @param string $value
     * @return bool
     */
    public function passes($field,$value)
    {
     if(strlen($value) < $this->lower)
     {
         return false;
     }
        if(strlen($value) > $this->upper)
        {
            return false;
        }

        return true;
    }
    /**
     * @return string
     */
    public function message($field)
    {
        return $field . ' must be between ' .$this->lower. ' and '.$this->upper.' characters';
    }
}