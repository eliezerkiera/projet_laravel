<?php

namespace App\Traits;

use Str;

trait HandleInputValue
{
    public function getValue()
    {
        if(!$this->isWired)
        {
            return old($this->name, $this->defaultValue);
        }
    }


    public function generateId($type)
    {
        $random=Str::random(4);
        return "form-input-".$type."-".$this->name."-".$random;
    }

    public function checkError()
    {
        $errors = session()->get('errors');
        return ($this->showErrors && $errors->has($this->name)) ? true : false;
    }
}
