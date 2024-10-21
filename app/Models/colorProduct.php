<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colorProduct extends Model
{
    use HasFactory;
    protected $fillable =['color', 'color_name'];
    public function product()
    {
    	return $this->belongstoMany(product::class);
    }
}
