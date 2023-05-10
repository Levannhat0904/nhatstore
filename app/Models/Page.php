<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable =['title', 'content', 'cat', 'user_id'];
    function user(){
        // return $this->hasOne('App\featureImage');
        return $this->belongsTo(User::class);//(1-n)
    }
}
