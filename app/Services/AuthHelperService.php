<?php

namespace App\Services;

use Illuminate\Support\Str;

class AuthHelperService
{
    public function generateNewPassword(): string
    {
        return Str::random();
    }

    public function generateNewLogin(int $length = 20): string
    {
        return Str::random($length);
    }
}
