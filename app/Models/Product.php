<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\morphMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'title',
        'store_id',
        'category_id',
        'vending_machine_id',
        'user_id',
        'price',
        'priority',
        'quantity',
        'type',
        'capacity',
        'desc',
    ];
    /**
     * Get the product's image.
     */
    public function image(): morphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function vendingMachine(): BelongsTo
    {
        return $this->belongsTo(VendingMachine::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function rfids()
    {
        return $this->hasMany(Rfid::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
