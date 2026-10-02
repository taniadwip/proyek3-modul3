<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes; // 1. Import ini

class Activity extends Model
{
    use SoftDeletes; // 2. Gunakan trait ini

    protected $fillable = [
        'code',
        'category_id',
        'title',
        'description',
        'activity_date',
        'status',
    ];

    protected $casts = [
        'activity_date' => 'date',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}