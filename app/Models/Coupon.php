<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    public function histories()
    {
        return $this->hasMany(History::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
