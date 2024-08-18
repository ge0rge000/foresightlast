<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_company',
        'activity_company',
        'government_id',
        'city_id',
        'address',
        'response_id', // Add response_id here
        'user_id_register',
        'classification', // Add classification here
        'created_at',
        'updated_at',
    ];

    public function contactPersons()
    {
        return $this->hasMany(ContactPerson::class, 'company_id ');
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_company');
    }

    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'government_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id_register');
    }
    public function response()
    {
        return $this->belongsTo(ClientResponse::class, 'response_id');
    }
}
