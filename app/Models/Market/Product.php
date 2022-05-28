<?php

namespace App\Models\Market;

use App\Models\Content\Comment;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes,Sluggable;

    public function sluggable(): array
    {
        return[
            'slug' =>[
                'source' => 'title'
            ]
        ];
    }
    protected $casts = ['image' => 'array'];
    protected $fillable = [
        'title' , 'description' , 'price' , 'inventory' , 'view_count','slug', 'image'
    ];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class)->using(ProductAttributeValues::class)->withPivot(['value_id']);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    public function gallery()
    {
        return $this->hasMany(ProductGallery::class);
    }
}
