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

        $relatedProducts = Electronic::where('price', '>=', $electronics->price - 100)
            ->where('price', '<=', $electronics->price + 100)
            ->limit(10)
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Related Products',
            'data' => $relatedProducts
        ]);
    
    }
}
