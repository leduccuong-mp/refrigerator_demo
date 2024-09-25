<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintain extends Model
{
    use HasFactory;
    protected $table = 'maintains';

    protected $fillable = [
        'site_name',
        'maintenance_ico',
        'maintenance_co',
        'maintenance_lin',
        'is_maintenance',
        'ios_app_version',
        'android_app_ver',
        'started_at',
        'ended_at',
        'deleted_at',
        'is_update',
        'is_force_update',
        'is_device',
        'ios_os_version',
        'android_os_vers',
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

    public function getTimeLineFormatAttribute()
    {
        try {
            return Carbon::parse($this->started_at)->format('Y年m月d日 H:i') . ' ~ ' . Carbon::parse($this->ended_at)->format('Y年m月d日 H:i');
        } catch (\Exception $e) {
            return '';
        }
    }
}
