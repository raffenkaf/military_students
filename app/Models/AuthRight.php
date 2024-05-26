<?php

namespace App\Models;

use App\Models\Enums\AccessTypes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer id
 * @property integer user_group_id
 * @property string access_type
 * @property array access_details
 */
class AuthRight extends BaseModel
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

    public function informationAboutAccess(): string
    {
        if ($this->access_type === AccessTypes::SOME_STUDY_MATERIALS->value) {
            return $this->access_type
                . ', групи знань '
                . implode(', ', $this->access_details['knowledge_entity_groups']);
        }
        return $this->access_type;
    }
}
