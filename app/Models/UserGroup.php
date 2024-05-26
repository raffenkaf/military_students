<?php

namespace App\Models;

use App\Traits\GetShortDescriptionTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * @property integer id
 * @property string name
 * @property string description
 * @property AuthRight[] authRights
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
        return $this->hasMany(AuthRight::class);
    }

    public function accessTypeIds(): Collection
    {
        return $this->authRights->pluck('access_type');
    }
}
