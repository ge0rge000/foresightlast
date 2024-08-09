<?php

// app/Models/ActivityCompany.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityCompany extends Model
{
    use HasFactory;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
