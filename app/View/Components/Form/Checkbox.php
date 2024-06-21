<?php

namespace App\View\Components\Form;

use App\Traits\HandleInputValue;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
{

    use HandleInputValue;

    public string $name;
    public string $label;
    public string | int $value;
    public string $id;

    public bool $isWired;
    public bool $showErrors;

    public string | int | null $defaultValue;
    public bool $isChecked;
    public bool $hasError;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $name,
        string $label = '',
        string | int $value = 1,

        bool $isWired = false,
        bool $showErrors = false,
        string |int | null $defaultValue = null
    )
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->isWired = $isWired;
        $this->showErrors = $showErrors;
        $this->id = $this->generateId('checkbox');
        $this->defaultValue = $defaultValue;

        $value = $this->getValue();

        $this->isChecked = ($value == $this->value) ? true : false;
        $this->hasError = $this->checkError();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.checkbox');
    }
}
