<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name' , 'parent'];

    public function child()
    {
        return $this->hasMany(Category::class , 'parent' , 'id');
    }


    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
