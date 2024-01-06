<?php

namespace App\Http\Controllers;

// use\App\Models\Order;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function order()
    {

        $products = Product::all();
        return view("order.create", compact("products"));
    }
    public function items($id)
    {
        $product = Product::find($id);

        return response()->json([
            'code' => $product->code,
            'sale_rate' => $product->sale_rate,
        ]);
    }
    public function itemsByCode($code)
    {
        $product = Product::where('code', $code)->first();

        if ($product) {
            return response()->json([
                'id' => $product->id,
                'code' => $product->code,
                'sale_rate' => $product->sale_rate,
            ]);
        } else {
            return response()->json(['error' => 'Product not found.'], 404);
        }
    }
    public function store(Request $request){
        $order = new Order();
        $order->customer_name = $request->input('customer_name');
        $order->customer_phone = $request->input('customer_phone');
        $order->sub_total = $request->input('sub_total');
        $order->disc = $request->input('disc');
        $order->grand_total = $request->input('grand_total');
        $order->paid = $request->input('paid');
        $order->save();
        // flashy()->info('Products will be Added Successfully. ✅', '#');
        return redirect()->route('order.create')->with('success', 'Order created successfully');
}
    
}



