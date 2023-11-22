<?php

namespace App\Http\Controllers;
use App\Models\Brand;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function product(){
        $categories = Category::all();
        $brand = Brand::all();
        return view("product-add",compact("categories",'brand'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $filePath='';

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName =uniqid('img').'.'.$file->getClientOriginalExtension();
            $filePath = $file->storeAs('uploads/products',$fileName,'public');
        }

        $product = Product::create([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'brand_id' => $request->input('brand_id'),
            'code' => $request->input('code'),
            'quantity' => $request->input('quantity'),
            'purchase_rate' => $request->input('purchase_rate'),
            'sale_rate' => $request->input('sale_rate'),
            'description' => $request->input('description'),
            'photo'=>$filePath,
        ]);
        flashy()->info('Products will be Added Successfully. ✅', '#');

           return redirect()->route('product.add');
    }

}
