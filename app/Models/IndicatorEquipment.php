<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndicatorEquipment extends Model
{
    use HasFactory;
    protected $table = 'indicator_equipment';

    protected $fillable = [
        'name',
    ];
}
