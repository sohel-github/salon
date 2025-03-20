<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'image', 'address', 'social_link', 'birthday', 'blood_group',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
