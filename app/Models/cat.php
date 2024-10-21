<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cat extends Model
{
    use HasFactory;
    protected $fillable =['cat', 'slug'];
    function cat_post()
    {
        return $this->hasMany(cat_post::class); // ket noi du lieu quan he(1-n)
    }
    function cat_product()
    {
        return $this->hasMany(CatProduct::class); // ket noi du lieu quan he(1-n)
    }
}
