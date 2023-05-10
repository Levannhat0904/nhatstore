<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productCat extends Model
{
    protected $fillable =['catagory', 'catagory_item'];
    use HasFactory;
    public function products()
    {
        return $this->hasMany(product::class,"cat_id");
    }
}
