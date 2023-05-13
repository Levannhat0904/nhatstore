<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatProduct extends Model
{
    use HasFactory;
    protected $fillable = ['cat_item','cat_id'];
    public function cat()
    {
        return $this->belongsTo(cat::class);
    }
    public function product(){
        return $this->hasMany(product::class,'cat_id');
    }
    
}
