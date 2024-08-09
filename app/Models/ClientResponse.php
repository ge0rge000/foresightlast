<?php

// app/Models/Response.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientResponse extends Model
{
    use HasFactory;
    protected $table = 'clientresponses';

    protected $fillable = ['type_response'];

    public function followings()
    {
        return $this->hasMany(Following::class);
    }
}
