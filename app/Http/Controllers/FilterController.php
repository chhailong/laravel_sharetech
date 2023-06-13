<?php

namespace App\Http\Controllers;

use App\Models\Electronic;
use Illuminate\Http\Request;

class FilterController extends Controller
{

        public function index(Request $request){
            
            $request->validate([
                'name' => 'requird',
                'major'=> 'required', 
                'price'=>'required'

            ]);
            
            $query =  Electronic::query() ;
            
            // if(isset($request->name) && ($request->name  != null)) {
            //     $query->where( 'name' , $request->name); 

            // }
            // if(isset($request->major) && ($request->major  != null)) {
            //     $query->where('major' , $request->major); 

            // }

            // if ($request->has('name')) {
            //     $query->where('name', 'like', '%' . $request->get('name') . '%');
            // }
    
            // if ($request->has('major')) {
            //     $query->where('major', 'like', '%' . $request->get('major') . '%');
            // }


            // if ($request->has('price')) {
            //     $query->where('price',  $request->get('price'));
            // }

            if(isset($request->name) && ($request->name != null ))
            {
                $query->where('name' , $request->name) ; 
            }
            if(isset($request->major) && ($request->major != null ))
            {
                $query->where('major' , $request->major) ; 
            }


            if( isset($request->min) && ($request->min != null ))

            {
                $query->where('price' , '>=' , $request->min); 

            }
            if( isset($request->max) && ($request->max != null ))
            {
                $query->where('price' , '<=' , $request->mix); 

            }
    
            return $query->paginate();

        }


}
