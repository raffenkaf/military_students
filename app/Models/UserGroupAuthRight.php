<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer id
 * @property integer user_group_id
 * @property string access_type
 * @property array access_details
 */
class UserGroupAuthRight extends BaseModel
{
    protected $fillable = [
        'user_group_id',
        'access_type',
        'access_details',
    ];

    protected $casts = [
        'access_details' => 'array',
    ];

    public function userGroup(): BelongsTo
    {
        return $this->belongsTo(UserGroup::class);
    }
}
