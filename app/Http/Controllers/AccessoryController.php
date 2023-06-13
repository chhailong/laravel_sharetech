<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Accessory;
use App\Models\Electronic;

class AccessoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accessory = Accessory::get();
        return response()->json([
            'success' => true,
            'message' => 'accessories List',
            'data' => $accessory
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
     * 
     * 
     */
    public function store(Request $request)

    {

        $accessories =new Accessory();
        // $accessories = Electronic::find($request->input('accessories_id'));
        $accessories->brand = $request->input('brand'); 
        $accessories->connectivity = $request->input('connectivity') ; 
        $accessories->special_feature = $request->input('special_feature'); 
        $accessories->save() ; 

        return response([
            'accessories' => $accessories 
        ]); 
    
        // return Accessory::create($request->all());
      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request , Accessory $accessories)
    {
        $accessories->brad = $request->get('brand');
        $accessories->connectivity = $request->get('connectivity');
        $accessories->special_feature = $request->get('special_feature');
        $accessories->save();
        return response([
            'message' => 'update successfully'  , 
            'accessories' => $accessories
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        
        $accessories = Accessory::find($id);
        $accessories->delete();
        return response([
            'message' => 'delete successfully', 
            'accessories' => $accessories
        ]);
    }
}
