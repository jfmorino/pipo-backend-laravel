<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    use HasFactory;

    public function orderDetail()
    {
        return $this->belongsTo(OrderDetail::class);
    }
}
