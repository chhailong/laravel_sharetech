<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Laptop extends Model
{
    use HasFactory;
    protected $table = 'laptops' ;
    protected $guarded = ["id"];
    protected $fillable = [
        'electronic_id' ,
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

    
}
