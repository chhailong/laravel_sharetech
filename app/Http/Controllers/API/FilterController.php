<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use App\Models\Electronic;
use Illuminate\Http\Request;

class FilterController extends Controller

{
        public function index(Request $request  ){
            
            $electronics =  Electronic::query();
            if ($request->has('name')) {
                $electronics->where('name', 'like', '%'. $request->name . '%');
            }
            if ($request->has('major')) {
                $electronics->where('major', 'like', '%'. $request->major . '%');
            }
    
            if ($request->has('price')) {
                $electronics->where('price', '>=', $request->price-200);
                $electronics->where('price', '<=', $request->price + 200);
            }
    
            $electronics->limit(10);
    
            return $electronics->get();


            // if(isset($request->name) && ($request->name != null ))
            // {
            //     $query->where('name' , $request->name) ; 
            // }
            // if(isset($request->major) && ($request->major != null ))
            // {
            //     $query->where('major' , $request->major) ; 
            // }

            // if( isset($request->min) && ($request->min != null ))

            // {
            //     $query->where('price' , '>=' , $request->min); 

            // }
            // if( isset($request->max) && ($request->max != null ))
            // {
            //     $query->where('price' , '<=' , $request->mix); 
            // }

            // return $query->paginate(10);
         
        }
}
