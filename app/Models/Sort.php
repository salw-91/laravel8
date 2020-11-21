<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sort extends Model
{
    protected $fillable = ['sort'];

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    use HasFactory;
}
