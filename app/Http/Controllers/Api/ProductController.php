<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\ProductService;

class ProductController extends Controller
{
    private $service;

    public function __construct(ProductService $service) {
        $this->service = $service;
    }

    public function store(Request $request)
    {
        return $this->service->store($request->all());
    }

    public function getList()
    {
        return $this->service->getList();
    }

    public function get($id)
    {
        return $this->service->get($id);
    }

    public function update(Request $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
