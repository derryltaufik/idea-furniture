<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\ProductType;

class ProductController extends Controller
{
    public function index($id){
        $data = Product::find($id);

        return view('product')->with(['product'=>$data]);
    }

    // validate the value, add to member's cart if success
    public function addToCart(Request $request, $id){
        $product = Product::find($id);
        $request->validate([
            'quantity' => "numeric | between:1,$product->stock",
        ]);

        return back()->with('success','Product has been added to cart!');
    }

    // return view for add product form
    public function addProduct(){
        $productTypes = ProductType::all();

        return view('addProduct')->with('productTypes',$productTypes);
    }

    // validate add product form, add to database if success
    public function saveProduct(Request $request){
        $request->validate([
            'name' => 'required|min:5',
            'image' => 'nullable|mimes:jpeg,png,gif',
            'productType' => "required|exists:App\ProductType,id",
            'stock' => 'required|integer|min:1',
            'price' => 'required|integer|min:1',
            'description' => 'required|min:15'
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->product_type_id = $request->productType;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->description = $request->description;
        
        if(isset($request->image)){
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            Storage::putFileAs('public/product/'.$product->productType->name, $image, $request->name . '.' . $ext);
            
            $product->image = 'product/'.$product->productType->name . '/' . $request->name . '.' . $ext;
        }else{
            $product->image = null;
        }
        $product->save();

        return back()->with('success','Product has been added');
    }

    // return the form for updating product
    public function updateProduct($id){
        $productTypes = ProductType::all();
        $product = Product::find($id);

        return view('updateProduct')->with(['productTypes'=>$productTypes, 'product'=>$product]);
    }

    // validate update product form, update the database if success
    public function saveUpdateProduct(Request $request, $id){
        $request->validate([
            'name' => 'required|min:5',
            'image' => 'nullable|mimes:jpeg,png,gif',
            'productType' => "required|exists:App\ProductType,id",
            'stock' => 'required|integer|min:1',
            'price' => 'required|integer|min:1',
            'description' => 'required|min:15'
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->product_type_id = $request->productType;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->description = $request->description;

        if(isset($request->image)){
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            Storage::delete('public/'.$product->image);
            Storage::putFileAs('public/product/'.$product->productType->name, $image, $request->name . '.' . $ext);
            
            $product->image = 'product/'.$product->productType->name . '/' . $request->name . '.' . $ext;
        }else{
            $imagePath = explode(".",$product->image);
            $ext = $imagePath[1];
            $oldPath = $product->image;
            $product->image = 'product/'.$product->productType->name . '/' . $request->name . '.' . $ext;
            Storage::move('public/'.$oldPath, 'public/'.$product->image);
        }
        $product->save();
        
        return back()->with('success','Product has been updated');
    }

    //delete product and its image from database
    public function deleteProduct($id){
        $product = Product::find($id);
        Storage::delete('public/'.$product->image);
        $product->delete();

        return back();
    }
}
