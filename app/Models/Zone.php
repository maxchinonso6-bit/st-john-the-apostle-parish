<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $fillable = [
        'station_id', 'name', 'description', 'meeting_day', 'meeting_time', 'meeting_venue'
    ];

    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    public function executives()
    {
        return $this->hasMany(ZoneExecutive::class);
    }
}
