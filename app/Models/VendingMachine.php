<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\morphMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class VendingMachine extends Model
{
    use HasFactory;
    protected $table = 'vending_machines';

    protected $fillable = [
        'id',
        'store_id',
        'category_id',
        'title',
        'post_code',
        'pref21',
        'addr21',
        'strt21',
        'desc',
        'status',
        'latitude',
        'longitude',
        'ip_address',
        'icon',
    ];

    /**
     * Get the machine's image.
     */
    public function image(): morphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * Get the comments for the blog post.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get the comments for the blog post.
     */
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }


    /**
     * Get the comments for the blog post.
     */
    public function getIconAttribute($value)
    {
        return Storage::url($value);
    }
}
