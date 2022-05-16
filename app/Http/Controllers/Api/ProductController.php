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

        try {
            $productData = $request->all();
            $this->product->create($productData);
            return response()->json(['msg' => 'Produto inserido com sucesso!'], 201);

        } catch (\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010));
            }
            return response()->json(ApiError::errorMessage('Houve um erro ao realizar a operação', 1010)); 
        }
    }
}
