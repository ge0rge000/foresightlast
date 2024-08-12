<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    use HasFactory;

    protected $table = 'contact_persons';

    protected $fillable = [
        'name',
        'mobile_number',
        'second_mobile_number',
        'address',
        'job',
        'company_id',
        'created_at',
        'updated_at',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function receiveOrders()
    {
        return $this->hasMany(ReceiveOrder::class, 'person_id');
    }

    public function followings()
    {
        return $this->hasMany(Following::class);
    }


}
