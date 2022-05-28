<?php

namespace App\Models\Custom;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndexPage extends Model
{
    protected $table = 'index_pages';
    use HasFactory;
    protected $casts = ['image' => 'array'];
    protected $fillable = ['name','image'];
}
