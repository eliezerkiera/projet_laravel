<?php

namespace App\Traits;


trait HandleInputValue
{
    public function getValue(string $name = "", $default)
    {

        if($this->isWired)
        return old($name, $default);
    }


    public function generateId($type)
    {
        return "form-input-".$type."-".$this->name;
    }
}
