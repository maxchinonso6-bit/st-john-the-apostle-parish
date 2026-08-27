<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MassBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booker_name', 'phone', 'email', 'intention_type', 'intention_text',
        'mass_date', 'amount', 'proof_of_payment', 'payment_status'
    ];
}