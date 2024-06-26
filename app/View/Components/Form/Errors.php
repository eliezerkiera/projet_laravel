<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Errors extends Component
{
    /**
     * Create a new component instance.
     */

     public string $name;
     public bool $isWired;
    public function __construct(
        string $name,
        bool $isWired = false
    )
    {
        $this->name = $name;
        $this->isWired = $isWired;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.errors');
    }
}
