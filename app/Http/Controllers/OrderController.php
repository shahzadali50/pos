<?php

namespace App\Http\Controllers;
// use\App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function order(){

        $products = Product::all();
        return view("order.create",compact("products"));
    }
    public function items($id)
{
    $product = Product::find($id);

    return response()->json([
        'code' => $product->code,
        'sale_rate' => $product->sale_rate,
    ]);
}

public function code($code)
    {
        $product = Product::where('code', $code)->first();

        if ($product) {
            return response()->json(['success' => true, 'data' => $product]);
        } else {
            return response()->json(['success' => false, 'message' => 'Product not found']);
        }
    }


}
