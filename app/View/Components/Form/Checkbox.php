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

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $name,
        string $label = '',
        string | int $value = 1
    )
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->id = $this->generateId('checkbox');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.checkbox');
    }
}
