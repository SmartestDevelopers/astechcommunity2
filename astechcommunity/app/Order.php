<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'purchasable_type',
        'purchasable_id',
        'amount',
        'currency',
        'status',
        'payment_method',
        'payment_reference',
        'customer_name',
        'customer_email',
        'customer_phone',
        'notes',
    ];

    public function purchasable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


