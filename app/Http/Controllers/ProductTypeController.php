<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\ProductType;

class ProductTypeController extends Controller
{
    // index of route productType
    public function index(Request $request, $id){
        $productType = ProductType::find($id);
        $data = Product::where('product_type_id','=',$id)->where('name','like','%'.$request->search.'%')
            ->paginate(10)->appends(['search'=>$request->search]);

        return view('productType')->with(['products'=>$data, 'productType'=>$productType]);
    }

    // return view for add product type form
    public function addProductType(){
        return view('addProductType');
    }

    // validate add product type form, add to database if success
    public function saveProductType(Request $request){
        $request->validate([
            'name' => 'required|unique:App\ProductType,name|min:4',
            'image' => 'nullable|mimes:jpeg,png,gif',
        ]);

        $productType = new ProductType;
        $productType->name = $request->name;

        if(isset($request->image)){
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            Storage::putFileAs('public/product types/', $image, $request->name . '.' . $ext);
            
            $productType->image = 'product types/' . $request->name . '.' . $ext;
        }else{
            $productType->image = null;
        }

        $productType->save();

        return back()->with('success','Product Type has been added');
    }

    // return the form for updating product type
    public function updateProductType($id){
        $productType = ProductType::find($id);

        return view('updateProductType')->with('productType',$productType);
    }

    // validate update product type form, update the database if success
    public function saveUpdateProductType(Request $request, $id){
        $request->validate([
            'name' => 'required|unique:App\ProductType,name|min:4',
            'image' => 'nullable|mimes:jpeg,png,gif',
        ]);

        $productType = ProductType::find($id);
        $productType->name = $request->name;

        if(isset($request->image)){
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            Storage::delete('public/'.$productType->image);
            Storage::putFileAs('public/product types/', $image, $request->name . '.' . $ext);
            
            $productType->image = 'product types/' . $request->name . '.' . $ext;
        }else{
            $imagePath = explode(".",$productType->image);
            $ext = $imagePath[1];
            $oldPath = $productType->image;
            $productType->image = 'product types/' . $request->name . '.' . $ext;
            Storage::move('public/'.$oldPath, 'public/'.$productType->image);
        }

        $productType->save();

        return back()->with('success','Product Type has been updated');
    }

    //delete product type and its image from database
    public function deleteProductType($id){
        $productType = ProductType::find($id);
        Storage::delete('public/'.$productType->image);
        $productType->delete();

        return back();
    }
}
