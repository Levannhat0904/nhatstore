<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['title', 'content', 'user_id', 'cat_id','img'];
    function user(){
        // return $this->hasOne('App\featureImage');
        return $this->belongsTo(User::class);//(1-n)
    }
    function cat(){
        // return $this->hasOne('App\featureImage');
        return $this->belongsTo(cat_post::class,'cat_id');//(1-n)
    }
}
