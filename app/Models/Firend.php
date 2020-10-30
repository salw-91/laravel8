<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firend extends Model
{
    protected $fillable = ['firend_name','firend_age','bio'];
    use HasFactory;
}
