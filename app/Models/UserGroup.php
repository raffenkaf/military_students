<?php

namespace App\Models;

use App\Traits\GetShortDescriptionTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property integer id
 * @property string name
 * @property string description
 */
class UserGroup extends BaseModel
{
    use HasFactory, GetShortDescriptionTrait;

    protected $fillable = [
        'name',
        'description',
    ];
}
