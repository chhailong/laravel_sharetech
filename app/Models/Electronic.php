<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\ElectronicType;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Electronic extends Model
{

    use HasFactory ;
    protected $guarded = ["id"] ;
    protected $table = 'electronics' ;
    protected $fillable = [
        'name',
        'electronic_type_id',
        'image1',
        'image2',
        'image3',
        'price',
        'description',
        'major',
        'shop_name',

        
    ];


    public function getCatagories():BelongsTo
    {
        return $this->belongsTo(ElectronicType::class ,'electronic_type_id' , 'id' ) ; 
    }

    public function getLaptop():HasOne
    {
        return $this->hasOne(Laptop::class ,'electronic_id','id' ) ; 
    }

    
}
