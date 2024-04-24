<?php

namespace App\Traits;


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
        return "form-input-".$type."-".$this->name;
    }
}
