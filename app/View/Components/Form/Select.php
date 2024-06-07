<?php

namespace App\View\Components\Form;

use App\Traits\HandleInputValue;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
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


     public array $options;


    public function __construct(
        string $name,
        string $label = '',
        bool $isWired = false,
        bool $showErrors = false,
        array $options = [],
        string | int $defaultValue = ''
    )
    {
        $this->name = $name;
        $this->label= $label;
        $this->isWired = $isWired;
        $this->showErrors = $showErrors;
        $this->options = $options;
        $this->defaultValue = $defaultValue;
        $this->value = $this->getValue();

        $this->id = $this->generateId('select');

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select');
    }
}
