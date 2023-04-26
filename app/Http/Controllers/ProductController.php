<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        return 'test api';
    }

    

    public function store(Request $request)
    {
        return 'test api';
    }

    public function show($id)
    {
        return 'test api';
    }

    public function update(Request $request, $id)
    {
        return 'test api';
    }

    public function destroy($id)
    {
        return 'test api';
    }
}
