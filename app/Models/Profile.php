<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile_users';
    protected $fillable = [
        'telefoon',
        'bio',
        'link',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\Profile', 'user_id');
    }

    use HasFactory;
}
