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

    public function show($id) 
    {
        $product = $this->product->find($id);

        if(! $product) return response()->json(ApiError::errorMessage('Produto não encontrado!', 4040),404);

        $data = ['data' => $product];
        return response()->json($data);
    }

    public function store(Request $request) 
    {

        try {
            $productData = $request->all();
            $this->product->create($productData);

            return response()->json(['data' => ['msg' => 'Produto inserido com sucesso!'], 201],500);

        } catch (\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010),500);
            }
            
            return response()->json(ApiError::errorMessage('Houve um erro ao realizar a operação', 1010)); 
        }
    }

    public function update(Request $request, $id) 
    {

        try {
            $productData = $request->all();
            $productFind = $this->product->find($id);
            $productFind->update($productData);

            $return = ['data' => ['msg' => 'Produto atualizado com sucesso!']];
            return response()->json($return, 201,500);

        } catch (\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010), 500);
            }
            
            return response()->json(ApiError::errorMessage('Houve um erro ao realizar a operação', 1010)); 
        }
    }

    public function delete(Product $id) 
    {

        try {
            $id->delete();
            return response()->json(['data' => ['msg' => 'Produto excluido com sucesso!'], 200]);

        } catch (\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1012), 500);
            }

            return response()->json(ApiError::errorMessage('Houve um erro ao realizar a operação', 1010)); 
        }
    }
}
