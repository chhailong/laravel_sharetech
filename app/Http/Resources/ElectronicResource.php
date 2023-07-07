<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ElectronicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [

            'id' => $this->id,
            'name' => $this->name,
            'image1' => $this->image1,
            'image2' => $this->image2, 
            'image3' => $this->image3,
            'price' => $this->price,
            'description' => $this->description,
            'major' => $this->major,
            'shop_name' => $this->shop_name,
            'laptop'=>$this->getLaptop,
            'electronic_type'=>$this->getCatagories,
        ];

        // return parent::toArray($request);
    }
}
