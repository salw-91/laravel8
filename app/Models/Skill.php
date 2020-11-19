<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['skill'];

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
    use HasFactory;
}
