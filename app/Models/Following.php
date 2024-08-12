<?php
// app/Models/Following.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
    use HasFactory;
    protected $table = 'following';
    protected $fillable = [
        'user_id',
        'person_id',
        'comments',
        'created_at',
        'updated_at',
        'typefollow',
        'time_calling',
        'date_calling'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function contactPerson()
    {
        return $this->belongsTo(ContactPerson::class, 'person_id');
    }

 
}
