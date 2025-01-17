<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function vnpayPayment(Request $request)
    {
        $data = $request->all();
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('vnpay.return');
        $vnp_TmnCode = "PH554RX5";
        $vnp_HashSecret = "5JKXC8Z7LB90M5VJZ6KP2VC9B36ZOLGW";

        $vnp_TxnRef = rand(100000, 999999);
        $vnp_OrderInfo = "Payment for order #" . $vnp_TxnRef;
        $vnp_Amount = (int) $data['total'] * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
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
        dd($inputData);

        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash'], $inputData['vnp_SecureHashType']);
        ksort($inputData);
        $hashData = urldecode(http_build_query($inputData));
        $calculatedHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        dd([
            'hashData' => $hashData,
            'calculatedHash' => $calculatedHash,
            'vnp_SecureHash' => $vnp_SecureHash,
        ]);

        if ($calculatedHash === $vnp_SecureHash) {
            if ($inputData['vnp_ResponseCode'] === "00") {
                return view('success', ['data' => $inputData]);
            } else {
                return view('error', ['data' => $inputData]);
            }
        } else {
            return view('error', ['message' => 'Invalid signature!']);
        }
        
        
    }
}
