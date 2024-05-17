<?php

namespace App\Models;

use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected $fillable = [
        'exam_date',
        'start_time',
        'end_time',
        'creator_user_id',
    ];

    protected $casts = [
        'exam_date' => 'datetime:Y-m-d',
    ];

    protected function startTime(): Attribute
    {
        return Attribute::make(
//            get: fn (string $value) => Carbon::parse($value)->format('s'),
            set: fn (string $value) => CarbonInterval::seconds($value)->cascade()->format('%H:%I:%S'),
        );
    }

    protected function endTime(): Attribute
    {
        return Attribute::make(
//            get: fn (string $value) => Carbon::parse($value)->format('s'),
            set: fn (string $value) => CarbonInterval::seconds($value)->cascade()->format('%H:%I:%S'),
        );
    }
}
