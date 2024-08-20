<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_complain',
        'number_of_person',
        'compain',
        'reaction_complain',  // Add this line
        'user_id',
        'recieve_order_id',
        'created_at',
        'updated_at',
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship to the ReceiveOrder model
    public function receiveOrder()
    {
        return $this->belongsTo(ReceiveOrder::class, 'recieve_order_id');
    }
}
