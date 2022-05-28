<?php

namespace App\Models\Test;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use HasFactory;

    public function provinces()
    {
        return $this->belongsTo(province::class);
    }

    public function address()
    {
        return$this->hasMany(Address::class);
    }
}
