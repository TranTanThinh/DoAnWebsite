<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_Item;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'city' => 'required|string',
            'postcode' => 'required|string',
        ]);

        $order = new Order();
        $order->uid = auth()->id() ?? 1;
        $order->shippingAddressId = 1; 
        $order->status = 'Pending';
        $order->totalPrice = $request->total;
        $order->save();

        foreach ($request->products as $product) {
            $item = new Order_Item();
            $item->orderId = $order->id;
            $item->productId = $product['id'];
            $item->quantity = $product['quantity'];
            $item->price = $product['price'];
            $item->save();
        }

        return redirect()->route('index')->with('success', 'Order placed successfully.');
    }
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
