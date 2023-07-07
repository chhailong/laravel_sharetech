<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Electronic;
use Illuminate\Http\Request;

class RelatedController extends Controller
{
    public function index(Request $request)
    {
        $electronics = Electronic::findOrFail($request->id);


        $relatedProducts = Electronic::where('price', '>=', $electronics->price - 150)
            ->where('price', '<=', $electronics->price + 150)
            ->where('id', '!=', $electronics->id)
            ->limit(3)
            ->get();

        if(!$relatedProducts) {
            return response()->json([
                'success' => false,
                'message' => 'No Related Products Found'
            ]);
        }
        else{
            return response()->json([
                'success' => true,
                'message' => 'Related Products',
                'data' => $relatedProducts
            ]);
        }

        // return response()->json([
            
        //     'success' => true,
        //     'message' => 'Related Products',
        //     'data' => $relatedProducts
        // ]);
    }

  
}
