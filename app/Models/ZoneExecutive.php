<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoneExecutive extends Model
{
    use HasFactory;

    protected $fillable = [
        'zone_id', 'name', 'position', 'phone', 'photo', 'status', 'start_year', 'end_year'
    ];

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
}