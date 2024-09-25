<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'imageable_id',
        'imageable_type',
        'image_url',
        'priority'

    ];
    
    /**
     * Get the parent imageable model (user or post).
     */
    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getImageUrlAttribute($value)
    {
        return Storage::url($value);
    }
}
