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
        'shop_name',
        
    ];

    public function electronicType():BelongsTo

    {
        return $this->belongsTo(ElectronicType::class , 'electronic_type_id' , 'id') ; 
    }

    // public function scopeRelatedProductsByPrice($query, $price , $id)
    // {
   

    // // Get the products from each category that are within the price range
    // $electronics = [];
    // foreach ($electronics as $electronics) {
    //     $electronics[] = $electronics->electronics()->where('price', '>=', $price)->where('price', '<=', $price + 100)->get();
    // }
    
    // // Return the products
    // return $electronics;
    // dd($electronics);
    // }

    
}
