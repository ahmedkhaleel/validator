<?php
namespace App\Validation\Rules;

use App\Validation\validator;

class RequiredWithRule extends Rule
{
    protected $fields;
    /**
     * @param $value
     * @return bool
     */
    public function __construct(...$fields)
    {
        $this->fields = $fields;
    }
    /**
     * @param string $value
     * @return bool
     */
    public function passes($field,$value,$data)
    {
       foreach ($this->fields as $field)
       {
           if($value === '' && $data[$field] !=='')
           {
               return false;
           }
           return true;
       }

    }
    /**
     * @return string
     */
    public function message($field)
    {

        return $field .  ' is required with ' . implode(',',$this->fields);
    }
}