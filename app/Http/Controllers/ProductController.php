<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createProduct(ProductRequest $request): JsonResponse
    {
        try {
            $product = product::create($request->all());

            if($product)
            {
                return response()->json(['data' => $product, 'erros' => null], 200);
            }
            return response()->json(['data' => null, 'erros' => ['Nao foi possivel cadastrar o podruto'],400]);
        } catch (\Throwable $th) {
            return response()->json(['date'=> null, 'erros' => [$th->getMessage()]],500);
        };
    }
   
    public function listAllProducts(): JsonResponse{
        try {
            $products = product::get();
            return response()->json(['data' => $products, 'erros'=> null, 200]); 
        } catch (\Throwable $th) {
            return response()->json(['data' => null, 'erros'=> [$th->getMessage()]],500);
        }
    }

    public function listProduct(int $id): JsonResponse{
        try {
            $product = product::where('id', '=', $id)->first();
            if($product){
                return response()->json(['data' => $product, 'erros'=> null, 200]); 
            }
            return response()->json(['data' => null, 'erros'=> ['Produto nao encontrado'], 200]); 
        } catch (\Throwable $th) {
            return response()->json(['data' => null, 'erros'=> [$th->getMessage()]],500);
        }
    }

    public function updateProduct(int $id, ProductRequest $request): JsonResponse{
        try {
            $product = product::where('id', $id)->first();
            if($product){
                $product-> update($request->all());
                return response()->json(['data' => $product, 'erros' => null],200);
            }
            return response()->json(['data' => null, 'erros'=> ['Produto nao encontrado'], 200]); 
        } catch (\Throwable $th) {
            return response()->json(['data' => null, 'erros'=> [$th->getMessage()]],500);
        }
    }

    public function deleteProduct(int $id): JsonResponse{
        try {
            $product = product::where('id', $id)->first();
            if($product){
                $product-> delete();
                return response()->json(['data' => 'Produto deletado', 'erros' => null],200);
            }
        } catch (\Throwable $th) {
            return response()->json(['data' => null, 'erros'=> [$th->getMessage()]],500);
        }
    }
}
