<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class DropReview extends Model
{
    protected $table = 'drop_reviews';

    protected $fillable = [
        'drop_id',
        'name',
        'email',
        'rating',
        'review',
    ];

    protected $casts = [
        'rating' => 'integer',
    ];

    public function scopeForDrop($query, $dropId)
    {
        return $query->where('drop_id', $dropId)->latest();
    }

    public static function getAverageRating($dropId)
    {
        return self::where('drop_id', $dropId)->avg('rating') ?? 0;
    }

    public static function getReviewCount($dropId)
    {
        return self::where('drop_id', $dropId)->count();
    }
}
