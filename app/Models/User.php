<?php

namespace App\Models;

use App\Models\Acl\role;
use App\Models\Content\Comment;
use App\Models\Market\Order;
use App\Models\Market\Product;
use App\Models\Test\Address;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'phone',
        'last_name',
        'profile_photo_path',
        'user_type',
        'status',
        'email',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [

        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'profile_photo_path' => 'array',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function activeCode()
    {
        return $this->hasMany(ActiveCode::class);
    }

    public function isSuperUser()
    {
        return $this->user_type;
    }

    //==================>ACL
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

//    public function permissions()
//    {
//        return $this->belongsToMany(Permission::class);
//    }

    public function hasRole($roles)
    {
        return !! $roles->intersect($this->roles)->all();
    }

    public function hasPermission($permission)
    {
        return  $this->hasRole($permission->roles);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function addresses()
    {
        return $this->hasOne(Address::class);
    }
}
