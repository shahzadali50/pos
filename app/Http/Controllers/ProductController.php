<?php

namespace App\Http\Controllers;

use App\Models\Brand;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function product()
    {
        $categories = Category::all();
        $brand = Brand::all();
        return view("product.product-add", compact("categories", 'brand'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
        ]);
        $filePath = '';

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = uniqid('img') . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('uploads/products', $fileName, 'public');
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
            'photo' => $filePath,
        ]);
        flashy()->info('Products will be Added Successfully. ✅', '#');

        return redirect()->route('product.add');
    }
    // list
    public function list()
    {
        $products = Product::all();
        return view('product.product-list', compact('products'));
    }
    // delete
    public function delete($id)
    {

        $product = Product::find($id);

        if ($product) {
            // Delete the product photo if it exists
            if ($product->photo) {
                Storage::disk('public')->delete($product->photo);
            }

            // Delete the product
            $product->delete();

            flashy()->error('Product deleted successfully. ✅', '#');
        } else {
            flashy()->error('Product not found. ❌', '#');
        }

        return redirect()->route('product.list');

    }

    // edit
    public function edit($id)
    {
        $product = Product::find($id);

        if ($product) {
            $categories = Category::all();
            $brands = Brand::all();

            return view('product.product-update', compact('product', 'categories', 'brands'));
        } else {
            flashy()->error('Product not found. ❌', '#');
            return redirect()->route('product-add');
        }
    }


    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if ($product) {
            $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required',
                'brand_id' => 'required',
                'code' => 'required|numeric',
                'quantity' => 'required|numeric',
                'purchase_rate' => 'required|numeric',
                'sale_rate' => 'required|numeric',
                'description' => 'nullable|string',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
            ]);

            // Check if a new photo is provided
            if ($request->hasFile('photo')) {
                // Delete the old photo if it exists
                if ($product->photo) {
                    Storage::disk('public')->delete($product->photo);
                }

                // Upload and save the new photo
                $file = $request->file('photo');
                $fileName = uniqid('img') . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('uploads/products', $fileName, 'public');

                // Update the product with the new photo path
                $product->update([
                    'name' => $request->input('name'),
                    'category_id' => $request->input('category_id'),
                    'brand_id' => $request->input('brand_id'),
                    'code' => $request->input('code'),
                    'quantity' => $request->input('quantity'),
                    'purchase_rate' => $request->input('purchase_rate'),
                    'sale_rate' => $request->input('sale_rate'),
                    'description' => $request->input('description'),
                    'photo' => $filePath,
                ]);
            } else {
                // Update the product without changing the photo
                $product->update($request->except('photo'));
            }

            flashy()->info('Product updated successfully. ✅', '#');
        } else {
            flashy()->error('Product not found. ❌', '#');
        }

        return redirect()->route('product.list');
    }


    // AddStock
    public function AddStock(Request $request)
    {
        // Validate the request
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:1',
        ]);

        // Find the product
        $product = Product::find($request->product_id);

        if ($product) {
            $newQuantity = $product->quantity + $request->quantity;
            $product->update(['quantity' => $newQuantity]);

            return response()->json(['success' => true,'id'=>$product->id,'stock'=>$newQuantity]);
        }
        return response()->json(['success' => false, 'error' => 'Product not found.']);
    }
}
