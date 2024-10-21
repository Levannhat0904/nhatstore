<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cat_post extends Model
{
    use HasFactory;
    protected $fillable=['cat_item','cat_id'];
    public function cat()
    {
        return $this->belongsTo(cat::class);
    }
    public function post(){
        return $this->hasMany(Post::class,'cat_id');
    }
}
