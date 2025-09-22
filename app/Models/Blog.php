<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Blog extends Model
{
    protected $fillable = [
        'user_id' ,
        'title' ,
        'slug' ,
        'description' ,
        'main_image' ,
        'study_time' ,
        'status' ,
    ];

    /**
     * @return MorphMany
     */
    public function categories(): MorphMany
    {
        return $this->morphMany(Category::class, 'categorizable');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
