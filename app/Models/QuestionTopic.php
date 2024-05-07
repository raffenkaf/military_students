<?php

namespace App\Models;

use App\Traits\GetShortDescriptionTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionTopic extends BaseModel
{
    use HasFactory, GetShortDescriptionTrait;

    protected $fillable = ['name', 'description'];
}
