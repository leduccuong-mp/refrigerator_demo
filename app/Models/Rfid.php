<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Rfid extends Model
{
    use HasFactory;
    protected $table = 'rfids';

    protected $fillable = [
        'product_id',
        'rfid',
        'status',
        'deleted_at'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
