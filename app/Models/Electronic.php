<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\ElectronicType;

class Electronic extends Model
{

    use HasFactory ;
    protected $table = 'electronics' ;
    
    protected $fillable = [
        
        'name',
        'accessories_id',
        'laptop_id',
        'electronic_type_id',
        'image1',
        'image2',
        'image3',
        'price',
        'description',
        'major',
        'link_youtube',
        'shop_name',
        

    ];



    

    public function electronicType():BelongsTo

    {

        return $this->belongsTo(ElectronicType::class , 'electronic_type_id' , 'id') ; 
    }

    // public function getAccessory():HasOne
    // {
    //     return $this->hasOne(Accessory::class );

    // }


}
