<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Model;

class PaymentRequest extends Model
{
    protected $table = "sslcmrz_payment_requests";
    protected $primaryKey = "id";
    protected $guarded = [];
}
