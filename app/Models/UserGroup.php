<?php

namespace App\Models;

use App\Traits\GetShortDescriptionTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'user_user_group',
            'user_group_id',
            'user_id'
        );
    }

    public function authRights(): HasMany
    {
        return $this->hasMany(UserGroupAuthRight::class);
    }
}
