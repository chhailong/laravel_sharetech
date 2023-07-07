<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Electronic;

class FilterElectronicController extends Controller

{
    //
    public function filtering( Request $request){

        $query =  Electronic::query();
   
        if ($request->has('name')) {
            $query->where('name', 'like', '%'. $request->name . '%');
        }

        if ($request->has('major')) {
            $query->where('major', 'like', '%'. $request->major . '%');
        }

        if ($request->has('price')) {
            $query->where('price', '>=', $request->price-200);
            $query->where('price', '<=', $request->price + 200);
        }

        $query->limit(10);
        return $query->get();

    }
}
