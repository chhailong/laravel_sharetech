<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Electronic;
use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{

    public function index( User $user)
    {


        
        $favorites = Favorite::where('user_id', $user->id)->get();
       
         $favorites = Favorite::all();

        return response()->json([
            'success' => true,
            'message' => 'Favorites retrieved successfully.',
            'data' => $favorites
        ]);

    }


    // public function store(Request $request, Electronic $product)
    // {
    //     $user = Auth::user();
    //     $favorite = Favorite::where('user_id', $user->id)
    //         ->where('electronic_id', $product->id)
    //         ->first();

    //         return response()->json([
    //         'success' => true,
    //         'message' => 'Electronic saved to favorites.',
    //         'data' => $favorite
    //     ]);

    // }
    public function store(Request $request ,Electronic $electronic){


        $user = $request->user();

        $favorite = Favorite::where('user_id', $user->id)
            ->where('electronic_id', $electronic->id)
            ->first();

        if ($favorite) {
            $favorite->delete();
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'electronic_id' => $electronic->id,
            ]);
        }
     
        return response()->json([
            'success' => true,
            'message' => 'Electronic saved to favorites.',
            'data' => $electronic
        ]);
    }

    
    public function destroy(Request $request, $id)
    {
        $favorite = Favorite::find($id);
        $favorite->delete();
        return response()->json([
            'success' => true,
            'message' => 'Electronic removed from favorites.'

        ]);

    }



 
}
