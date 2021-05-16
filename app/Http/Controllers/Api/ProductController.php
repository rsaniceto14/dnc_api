<?php

namespace app\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Product as Product;
use App\Http\Resources\Product as ProductResource;

class ProductController extends Controller
{
   
    public function index()
    {
        $product = Product::paginate(15);
        return ProductResource::collection($product);
    }

 
    public function store(Request $request)
    {
        $product = new Product;
        $product->nome = $request->input('name');
        $product->tags = $request->input('tags');
        
        if($product->save()){
            return new ProductResource($product);
        }
        
    }

   
    public function show(Product $id)
    {
            $product = Product::findOrFail ($id);
            return new ProductResource($product) ;
    }

        
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }
}
