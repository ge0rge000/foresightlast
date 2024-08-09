<?php

// app/Models/Activity.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_of_activity',
    ];

    public function activityCompanies()
    {
        return $this->hasMany(ActivityCompany::class);
    }
}
