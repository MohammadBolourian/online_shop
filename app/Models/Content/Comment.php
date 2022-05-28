<?php

namespace App\Models\Content;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    protected $fillable = ['comment', 'parent_id', 'user_id', 'commentable_id', 'commentable_type', 'approved', 'status'];
    use HasFactory,SoftDeletes;



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }


    public function child()
    {
        return $this->hasMany(Comment::class , 'parent_id' , 'id');
    }

    public function answers()
    {
        return $this->hasMany($this, 'parent_id');
    }

}
