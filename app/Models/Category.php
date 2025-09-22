<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Category extends Model
{
    protected $fillable = [
        'title' ,
        'description' ,
        'main_image' ,
        'status'
    ];

    /**
     * @return MorphTo
     */
    public function categorizable():MorphTo
    {
        return $this->morphTo();
    }
}
