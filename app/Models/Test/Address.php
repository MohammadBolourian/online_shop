<?php

namespace App\Models\Test;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = ['address', 'postal_code','city_id','state','user_id'];

    public function cities()
    {
        return $this->belongsTo(city::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
