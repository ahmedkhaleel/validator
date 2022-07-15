<?php
namespace App\Validation\Rules;

class AhmedRule extends Rule
{
    /**
     * @param $value
     * @return bool
     */
    public function __construct(public $ahmed)
    {

    }
    /**
     * @param string $value
     * @return bool
     */
    public function passes($field,$value,$data)
    {
      return strlen($value) < $this->ahmed;
    }
    /**
     * @return string
     */
    public function message($field)
    {
        return $field . ' must be a max of '.' ' . $this->ahmed  . ' characters';
    }
}