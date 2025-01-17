<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class PaymentController extends Controller
{
    public function vnpayPayment(Request $request)
    {
        // Kiểm tra nếu không có 'total' trong request
        if (!$request->has('total')) {
            return redirect()->route('order.failure')->with('error', 'Total amount is missing.');
        }

        $data = $request->all();
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('vnpay.return');
        $vnp_TmnCode = "PH554RX5";
        $vnp_HashSecret = "5JKXC8Z7LB90M5VJZ6KP2VC9B36ZOLGW";

        $vnp_TxnRef = $data['order_id'];  // Sử dụng ID đơn hàng duy nhất
        $vnp_OrderInfo = "Payment for order #" . $vnp_TxnRef;
        $vnp_Amount = (int) $data['total'] * 100; // Chuyển thành xu
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';  // Có thể thay đổi nếu khách hàng chọn ngân hàng khác
        $vnp_IpAddr = $request->ip();

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => 'billpayment',
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        ksort($inputData);
        $hashdata = urldecode(http_build_query($inputData));
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);

        $vnp_Url = $vnp_Url . '?' . http_build_query($inputData) . '&vnp_SecureHash=' . $vnpSecureHash;

        return redirect()->away($vnp_Url);
    }


    public function vnpayReturn(Request $request)
    {
        $vnp_HashSecret = "5JKXC8Z7LB90M5VJZ6KP2VC9B36ZOLGW";
        $inputData = $request->all();
        // Kiểm tra thông tin trả về
        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash'], $inputData['vnp_SecureHashType']);
        ksort($inputData);
        $hashData = urldecode(http_build_query($inputData));
        $calculatedHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        // Kiểm tra hash dữ liệu trả về
        if ($calculatedHash === $vnp_SecureHash) {
            if ($inputData['vnp_ResponseCode'] === "00") {
                // Thanh toán thành công, cập nhật trạng thái đơn hàng
                $order = Order::find($inputData['vnp_TxnRef']);
                if ($order) {
                    $order->status = 'paid';
                    $order->save();
                }

                return view('order.success', ['data' => $inputData]); // Hiển thị thông báo thành công
            } else {
                return view('order.error', ['data' => $inputData]); // Hiển thị thông báo lỗi
            }
        } else {
            return view('order.error', ['message' => 'Invalid signature!']); // Dữ liệu không hợp lệ
        }
    }
}
