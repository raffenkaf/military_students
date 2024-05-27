<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function guestIndex()
    {
        if (auth()->check()) {
            return view('index');
        }
        return view('guest-index');
    }
}
