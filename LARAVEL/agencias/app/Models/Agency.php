<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'nameAgency',
        'cp',
        'address',
        'premium',
        'regular',
        'longitude',
        'latitude',
        'status'

    ];
        
}
