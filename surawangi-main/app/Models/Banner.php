<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Banner extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'thumbnail',
        'cta_url',
        'cta_text',
        'is_active',
        'page_type'
    ];

    protected $hidden = [
        'category_id',
    ];

     public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
