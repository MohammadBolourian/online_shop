<?php

namespace App\Models\Test;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    use HasFactory;

    public function cities()
    {
        return $this->hasMany(city::class);
    }
}
