<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method static find($searchParam)
 * @method static lastCreated()
 * @property integer creator_user_id
 */
class Exam extends BaseModel
{
    use HasFactory;

    /**
     * @var \Illuminate\Database\Eloquent\HigherOrderBuilderProxy|int|mixed|string|null
     */

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];
}
