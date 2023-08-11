<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Electronic;
use App\Models\ElectronicType;

class FilterElectronicController extends Controller

{


    //
    public function recommend(Request $request){

        $catagory =ElectronicType::all() ;
        $query = Electronic::query();
        if(isset($request->name)&&(request()->name != null)){
            $query->where('name', 'like', '%'. $request->name.'%');
        }
        if(isset($request->major)&&(request()->major != null)){
            $query->where('major', 'like', '%'. $request->major . '%');
        }
        if(isset($request->price)&&(request()->price !=null)){
            $query->where( 'price', '>=', $request->price);
        }
         if(isset($request->min_price)&&(request()->min_price !=null)){
            $query->where( 'price', '>=', $request->min_price);
        }
         if(isset($request->max_price)&&(request()->max_price !=null)){
            $query->where( 'price', '<=', $request->max_price);
        }
         if(isset($request->catagory)&&(request()->catagory !=null)){
            $query->where( 'electronic_type_id', '=', $request->catagory);
        }
        
        if($query === 0){
            return response()->json([
                'success' => false,
                'message' => 'No Electronics found',
                
            ]);
        }
        else{
            return response()->json([
                'success' => true,
                'message' => 'Electronics retrieved successfully.',
                $query->limit(10),
                'data' => $query->get()
            ]);
        }
        
      
     
    
        

        // $query =  Electronic::query();
   
        // if ($request->has('name')) {
        //     $query->where('name', 'like', '%'. $request->name.'%');
        // }

        // if ($request->has('major')) {
        //     $query->where('major', 'like', '%'. $request->major . '%');
        // }

        // if ($request->has('price')) {
        //     $query->where('price', '>=', $request->price-200);
        //     $query->where('price', '<=', $request->price + 200);
        // }


        // $query->limit(10);
        // return $query->get();

    }
}
