<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $isAdmin = app('App\Services\AuthRightService')->isAdmin(auth()->user());

        return view('layouts.app', ['isAdmin' => $isAdmin]);
    }
}
