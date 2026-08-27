<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParishCouncilExecutive extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'position', 'photo', 'bio', 'phone', 'status', 'start_year', 'end_year', 'order'
    ];
}