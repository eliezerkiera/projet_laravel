<?php

namespace App\View\Components\Form;

use App\Traits\HandleInputValue;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    /**
     * Create a new component instance.
     */
    use HandleInputValue;
    /**
     * Create a new component instance.
     */

     public string $name;
     public string $label;

     public bool $isWired;
     public bool $showErrors;

     public string | int $defaultValue;
     public string | int $value;

     public string $id;



     public bool $hasError;

     public function __construct(
       string $name,
       string $label = '',
       bool $isWired = false,
       bool $showErrors = false,
       string | int $defaultValue = ''
   )
   {
       $this->name = $name;
       $this->label= $label;
       $this->isWired = $isWired;
       $this->showErrors = $showErrors;
       $this->defaultValue = $defaultValue;
       $this->value = $this->getValue();

       $this->id = $this->generateId("textarea");

       $this->hasError = $this->checkError();

   }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.textarea');
    }
}
