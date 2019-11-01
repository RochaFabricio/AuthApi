<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class ProductController extends Controller
{
    protected $user;
 
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function index()
    {
        $product = Product::get();
        return $product;
    }

    public function show($id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Desculpe, o produto ' . $id . ' não pode ser encontrado'
            ], 400);
        }
    
        return $product;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|integer',
            'quantity' => 'required|integer'
        ]);
        
        try {

            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            if(isset($request->description)){
                $product->description = $request->description;
            }
            if(isset($request->color_id)){
                $product->color_id = $request->color_id;
            }
            $product->save();

            return response()->json([
                'success' => true,
                'product' => $product
            ]);

        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Desculpe, não foi possível adicionar o produto'
            ], 500);
        }
            
    }

    public function update($id, Request $request)
    {
        dd($user);
        $product = Product::find($id);
    
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Desculpe, o produto ' . $id . ' não pode ser encontrado'
            ], 400);
        }
    
        $updated = $product->fill($request->all())
            ->save();
    
        if ($updated) {
            return response()->json([
                'success' => true,
                'message' => 'Produto foi alterado',
                'product' => $product
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Desculpe, o produto não pôde ser atualizado'
            ], 500);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Desculpe, o produto ' . $id . ' não pode ser encontrado'
            ], 400);
        }
    
        if ($product->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Não foi possível excluir o produto'
            ], 500);
        }
    }

}
