<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{

    public function index () {
        return Product::all();
    }

    public function store (Request $request) {

        $data = $this->validate($request, [
            'description' => 'required|string|max:250|unique:products',
            'price' => 'required|numeric|max:1000000',
            'stock' => 'required|numeric|max:1000000'
        ]);
        
        $product = Product::create($data);
        return response()->json([
                'message' => 'Producto creado exitosamente', 
                'product' => $product
               ]);

    }

    public function update (Request $request, $product) {
        $data = $this->validate($request, [
            'description' => 'required|string|max:250|unique:products,description,'. $product,
            'price' => 'required|numeric|max:1000000',
            'stock' => 'required|numeric|max:1000000'
        ]);

        Product::findOrFail($product)->update($data);
        return response()->json(['message' => 'Producto actualizado exitosamente']);
    }

    public function show ($product) {
        $product = Product::findOrFail($product);
        return $product;
    }

    public function destroy ($product) {
        Product::findOrFail($product)->delete();

        return response()->json([
            'message' => 'Producto eliminado exitosamente'
        ]);
    }

    //
}
