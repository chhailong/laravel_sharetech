<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ElectronicType extends Model
{
    
    use HasFactory;
    protected $table = 'electronic_types' ;
    protected $fillable =[
        'type'
        
    ];


}
