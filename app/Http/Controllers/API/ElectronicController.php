<?php


namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Http\Resources\ElectronicResource;
use App\Http\Resources\ProductResource;
use App\Models\Accessory;
use Illuminate\Http\Request;
use  App\Models\Electronic;
use App\Models\ElectronicType;
use App\Models\Laptop;
use Ramsey\Uuid\Type\Integer;

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

            'name' => 'required',
            'image1' => 'required',
            'image2' => 'required',
            'image3' => 'required',
            'price' => 'required',
            'major' => 'required', 
        ]);
        return Electronic::create($request->all()); 
    
    }

    public function show(string $id) {

        $electronic = Electronic::find($id) ;

         //Attempt to read property &quot;getLaptop&quot on null

        $laptops = $electronic->getLaptop ;
        $electronic->getLaptop = $laptops ;

        $catagories =$electronic->getCatagories ; 
        $electronic->getCatagories = $catagories  ;
        return response()->json([
            'message'=> 'successfully get  electronics by id' ,
            'success' => true,
            'data' => $electronic,
        ]);

 
    
    }

    // public function getElectronicbyId( $id){
    //     $electronic = Electronic::find($id) ; 
    //     $laptop =$electronic->getLaptop ;
    //     $electronic->getLaptop = $laptop ;

    //     $electronicType =$electronic->getCatagories ;
    //     $electronic->getCatagories = $electronicType ;
    //     return response()->json([
    //         'message'=> 'successfully get  electronics by id' ,
    //         'success' => true,
    //         'data' => $electronic,
    //     ]);
    // }


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
            'data' => $electronics ,
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
            'data' => $electronics ,
        ] );
    }

    // search function 
    public function search($name){
        
        return Electronic::where('name' , 'like' , '%'.$name.'%')->get();
    }


}


