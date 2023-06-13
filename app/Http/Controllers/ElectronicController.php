<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use Illuminate\Http\Request;
use  App\Models\Electronic;
use App\Models\ElectronicType;
use App\Models\Laptop;

class ElectronicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $electronics = Electronic::get();
 
        return  response()->json([
            'message'=> 'successfully get all electronics', 
            'success' => true,
            'data' => $electronics,
        ]
        );
        // return response()->json($electronics); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $Accessory = Accessory::pluck('name', 'spac' , 'id') ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    {

        $request->validate([
            'laptop_id' => 'required',
            'accessories_id' => 'required',
            'name' => 'required',
            'image1' => 'required',
            'image2' => 'required',
            'image3' => 'required',
            'price' => 'required',
            'major' => 'required', 

        ]);
        return Electronic::create($request->all()); 
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $electronics = Electronic::find($id) ;
        $accessories = Accessory::find($electronics->accessories_id);
        $laptops = Laptop::find($electronics->laptop_id);

        // Server Error 500 need to  be fixed
        //  one to many relationship query 

        $electronicsType = $electronics->electronicType;
        $electronics->electronicType = $electronicsType ;

        

        
        $electronics->accessories = $accessories ;
        $electronics->laptops = $laptops ;

        $electronics = array($electronics);
        // dd($electronics);
        return response()->json([

            'message' => 'successfully get electronics',
            'success' => true,
            'data' => $electronics,

        ] ,200 );   

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

        $electronics = Electronic::find($id);
        $electronics->update($request->all());
        return response()-> json([
            'message'=> 'successfully updated electronics',
            'success' => true,
            'data' => $electronics,
        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        //

        $electronics = Electronic::find($id);
        $electronics->delete();
        return response()->json([
            'message' => 'successfully deleted electronics',
            'success' => true,
            'data' => $electronics,
        ] );
    }

    public function search($name){
        return Electronic::where('name' , 'like' , '%'.$name.'%')->get() ; 
    }
}
