<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public static function lastCreated(int $lastCreatedNumber = 20): Collection
    {
        return static::orderBy('id', 'desc')
            ->limit($lastCreatedNumber)
            ->get();
    }
}
