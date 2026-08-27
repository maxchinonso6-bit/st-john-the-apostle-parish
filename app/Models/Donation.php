<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'donation_project_id', 'donor_name', 'email', 'amount', 'proof_of_payment', 'payment_status'
    ];
    public function project()
    {
        return $this->belongsTo(DonationProject::class);
    }
}