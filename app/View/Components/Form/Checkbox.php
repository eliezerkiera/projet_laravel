<?php

namespace App\View\Components\Form;

use App\Traits\HandleInputValue;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
{
    use HandleInputValue;

    public string $label;
    public string $name;
    public $value;
    public bool $checked;
    public bool $showErrors;
    public bool $isWired;
    public string $id;
    public $default;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $name,
        string $label = "",
        $value = 1,
        bool $showErrors = true,
        bool $isWired = false,
        $default = false
    )
    {
        $this->name=$name;
        $this->label = $label;
        $this->value = $value;
        $this->showErrors = $showErrors;
        $this->isWired = $isWired;
        $this->id = $this->generateId('checkbox');
        $this->default = $default;

        $defaultValue = $this->getValue($this->name, $this->default);

        $this->checked = (intval($defaultValue) == 1)? true : false;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.checkbox');
    }
}
