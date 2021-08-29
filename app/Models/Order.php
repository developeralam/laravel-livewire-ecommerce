<?php

namespace App\Models;

use App\Models\User;
use App\Models\Shipping;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function shipping()
    {
        return $this->hasOne(Shipping::class);
    }
    public function transcation()
    {
        return $this->hasOne(Transaction::class);
    }
}
