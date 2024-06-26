<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $action,
        public string $routeBack,
        public string $method = 'POST',
        public string $enctype = 'multipart/form-data',
        public string $buttonText = 'Зберегти',
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.form');
    }
}
