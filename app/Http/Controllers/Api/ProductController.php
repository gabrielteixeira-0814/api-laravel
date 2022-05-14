<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product) {
        $this->product = $product;
    }


    public function index(Request $request) 
    {
        return response()->json($this->product->paginate(5));
    }

    public function show(Product $id) 
    {
        $data = ['data' => $id];
        return response()->json($data);
    }

    public function store(Request $request) 
    {
        dd($request->all());
    }
}
