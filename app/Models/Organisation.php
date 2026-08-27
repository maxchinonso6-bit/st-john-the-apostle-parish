<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'mission', 'slogan', 'meeting_day', 'meeting_time', 'meeting_venue', 'logo', 'order'];
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}