<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeTool extends Model
{
    use HasFactory;
    protected $table = 'type_tools';

    protected $fillable = [
        'name',
    ];
}
