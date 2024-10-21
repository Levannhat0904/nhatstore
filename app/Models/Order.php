<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['user_id','total','orderCode','address','phone_number','email','username', 'total_order', 'status' ];
    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
