<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'paymentIntent_id',
        'recept_url'
    ];

    public function items()
    {
        return $this->hasMany(OrderHistory::class);
    }
}
