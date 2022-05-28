<?php

namespace App\Models\Acl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'description'];

//    public function users()
//    {
//        return $this->belongsToMany(User::class);
//    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

}
