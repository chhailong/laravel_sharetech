<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Laptop extends Model
{
    use HasFactory;
    protected $fillable = [
    'brand',
    'os',
    'cpu',
    'ram',
    'gpu',
    'storage',
    'screen_size',
    'battery',
    'refresh_rate',
    'pro',
    'con',

    ];

    public function getElectronic():HasOne
    {
        return $this->hasOne(Electronic::class) ; 
    }

  
    
}
