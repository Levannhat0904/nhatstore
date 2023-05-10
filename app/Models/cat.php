<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cat extends Model
{
    use HasFactory;
    protected $fillable =['catagorys', 'catagory_item'];
    function posts()
    {
        return $this->hasMany(Post::class); // ket noi du lieu quan he(1-n)

    }
}
