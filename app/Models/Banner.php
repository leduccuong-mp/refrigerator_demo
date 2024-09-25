<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\morphOne;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banners';

    protected $fillable = [
        'title',
        'url',
        'image_url',
        'priority',
        'started_at',
        'ended_at',
        'status',
        'type',
        'deleted_at',
    ];

    public function getStartedAtFormatAttribute()
    {
        try {
            return Carbon::parse($this->started_at)->format('Y年m月d日 H:i');
        } catch (\Exception $e) {
            return '';
        }
    }

    public function getEndedAtFormatAttribute()
    {
        try {
            return Carbon::parse($this->ended_at)->format('Y年m月d日 H:i');
        } catch (\Exception $e) {
            return '';
        }
    }

    public function getImageUrlAttribute($value)
    {
        return Storage::url($value);
    }
}
