<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationProject extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'category', 'description', 'photo'];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}