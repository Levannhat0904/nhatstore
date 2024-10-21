<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    function posts()
    {
        return $this->hasMany(Post::class); // ket noi du lieu quan he(1-n)

    }
    function pages()
    {
        return $this->hasMany(Page::class); // ket noi du lieu quan he(1-n)
    }
    public function roles()
    {
        // return $this->belongsToMany(Role::class);
        return $this->belongsToMany(Role::class, 'user_roles');
    }
    public function hasPermission($permission){
        foreach ($this->roles as $role){
            if($role->permission->where('slug',$permission)->count()>0){
                return true;
            }
        }   
        return false;
        
     }

}
 