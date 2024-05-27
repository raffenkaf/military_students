<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AdminLayout extends Component
{
    public function render(): View
    {
        $isAdmin = app('App\Services\AuthRightService')->isAdmin(auth()->user());
        return view('layouts.admin', ['isAdmin' => $isAdmin]);
    }
}
