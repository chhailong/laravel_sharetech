<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Electronic;

class LaptopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $laptop = Laptop::get();
        return response()->json([
            'success' => true,
            'message' => 'laptops List',
            'data' => $laptop
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'electronic_id' => 'required',
            
        ]);
        return Laptop::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $laptop = Laptop::find($id);
        
        return response()->json([
            'success' => true,
            'message' => 'laptop List',
            'data' => $laptop
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $laptop = Laptop::find($id);
        $laptop->update($request->all());
        return response()->json([
            'success' => true,
            'message' => 'laptop updated',
            'data' => $laptop
        ]) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // return Laptop::destroy($id);

        $delete = Laptop::destroy($id) ; 

        return response([

            'message'=> 'delete successfully', 
            'status' => true ,
            'data' => $delete 
        ]);
    }

}
