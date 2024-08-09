<?php

// app/Models/Equipment.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    protected $table = 'equipments';
    protected $fillable = [
        'name',
        'serial',
    ];

    public function recieveOrder()
    {
        return $this->hasOne(ReceiveOrder::class,'equipment_id');
    }
}
