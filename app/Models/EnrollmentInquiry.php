<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollmentInquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'guardian_name', 'phone', 'email', 'child_class', 'message', 'status'
    ];
}