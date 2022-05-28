<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delivery extends Model
{
    protected $table = 'delivery';
    use HasFactory,SoftDeletes;

    protected $fillable = ['name', 'amount', 'status', 'delivery_time','delivery_time_unit'];

    public function getFullTimeAttribute()
    {
        return "{$this->delivery_time} {$this->delivery_time_unit}";
    }

}
