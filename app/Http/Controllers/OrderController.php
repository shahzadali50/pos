<?php

namespace App\Http\Controllers;

// use\App\Models\Order;
use App\Models\Order;
use App\Models\OrderItem;
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
    public function store(Request $request)
    {
        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'sub_total' => $request->sub_total,
            'disc' => $request->disc,
            'grand_total' => $request->grand_total,
            'paid' => $request->paid,
        ]);
        $orderID = $order->id;
        foreach ($request->product_id as $key => $value) {
            $order = OrderItem::create([
                'order_id' => $orderID,
                'product_id' => $request->product_id[$key],
                'product_qty' => $request->product_qty[$key],
                'product_price' => $request->product_price[$key],
            ]);
             // Decrease the quantity of the product
        $product = Product::find($request->product_id[$key]);
        $product->quantity -= $request->product_qty[$key];
        $product->save();

        }
        flashy()->success('Order will be Generate Successfully. ✅', '#');
        return redirect()->route('order.create');
    }
    public function order_list(){
        $list = Order::orderBy('id', 'desc')->get();
        return view('order.order-list', compact('list'));
    }
    public function order_items(){
        $list = OrderItem::with('product')->get();
        // $list = OrderItem::all();
        return view('order.order-items', compact('list'));
    }

    public function receipt($id)
{
    $order = Order::findOrFail($id);
    $orderItems = OrderItem::with('product')->where('order_id', $id)->get();
    return view('pos-invoice', compact('order', 'orderItems'));
}



}
