<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_Item;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

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
    public function index()
    {
        $orders = Order::paginate(10); // Lấy danh sách đơn hàng và phân trang
        return view('Template.pages.orders.order', compact('orders'));
    }


    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
    public function show($id)
    {
        $order = Order::with('orderItems')->findOrFail($id); // Lấy đơn hàng và các sản phẩm liên quan
        return view('Template.pages.orders.order_detail', compact('order')); // Trả về view chi tiết
    }
    public function edit($id)
    {
        // Tìm đơn hàng theo ID
        $order = Order::findOrFail($id);
        // Trả về view với đơn hàng để chỉnh sửa
        return view('Template.pages.orders.order_edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        // Validate dữ liệu từ form
        $validated = $request->validate([
            'status' => 'required|string|max:255',
            'totalPrice' => 'required|numeric',
        ]);

        // Tìm đơn hàng theo ID và cập nhật thông tin
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->totalPrice = $request->totalPrice;
        $order->save();

        // Chuyển hướng lại trang danh sách đơn hàng với thông báo thành công
        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }
    public function processOrder(Request $request)
    {
        try {
            DB::beginTransaction(); // Bắt đầu transaction

            // 1. Tạo đơn hàng mới
            $order = Order::create([
                'uid' => auth()->id(),
                'shippingAddressId' => $request->input('shippingAddressId', 0),
                'status' => 'pending',
                'totalPrice' => $request->input('totalPrice', 0),
            ]);

            // 2. Tạo bản ghi thanh toán
            Payment::create([
                'orderId' => $order->id,  // ID của đơn hàng vừa tạo
                'paymentMethod' => $request->input('payment_method', 'COD'),
                'paymentStatus' => 'pending',
                'amount' => $request->input('totalPrice', 0),
            ]);

            DB::commit(); // Commit transaction

            return response()->json(['message' => 'Order and payment created successfully!'], 200);
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction nếu có lỗi
            return response()->json(['message' => 'Failed to process the order.'], 500);
        }
    }
}
