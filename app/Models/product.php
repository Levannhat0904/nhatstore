<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'color','img', 'thumbnail', 'content', 'price', 'user_id', 'cat_id', 'total'];
    public function color()
    {
        return $this->belongstoMany(colorProduct::class);
    }
    public function productCat()
    {
        return $this->belongsTo(productCat::class, "cat_id");
    }
    public function order_detail()
    {
        return $this->hasOne(OrderDetail::class);
    }

}
