<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['organisation_id', 'title', 'description', 'date', 'recurrence', 'photo'];
    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }
}