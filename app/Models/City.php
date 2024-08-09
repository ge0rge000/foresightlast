<?php
// app/Models/City.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
