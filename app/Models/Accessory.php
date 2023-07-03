<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Accessory extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'brand',
        'spac_detail',
        'pro',
        'con'
 
    ];
}
