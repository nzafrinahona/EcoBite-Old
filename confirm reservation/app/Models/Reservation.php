<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'food_item_id',
        'quantity',
        'pickup_code',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function foodItem()
    {
        return $this->belongsTo(FoodItem::class);
    }
}
