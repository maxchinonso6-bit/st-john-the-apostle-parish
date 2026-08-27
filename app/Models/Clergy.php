<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clergy extends Model
{
    use HasFactory;

    protected $table = 'clergy';

    protected $fillable = [
        'name', 'role', 'status', 'start_year', 'end_year', 'photo', 'bio'
    ];
}