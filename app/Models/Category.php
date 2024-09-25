<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'icon',
        'sort',
        'deleted_at',
    ];

    public function getIconAttribute($value)
    {
        return Storage::url($value);
    }
}
