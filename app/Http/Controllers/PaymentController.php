<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function createPayment(Request $request)
    {
        $validated = $request->validate([
            'payment_method' => 'required|string|in:cash,momo',
            'amount' => 'required|numeric|min:1',
        ]);

        // Tạo thanh toán mới
        $payment = Payment::create([
            'payment_method' => $validated['payment_method'],
            'amount' => $validated['amount'],
        ]);

        // Xử lý thanh toán theo phương thức đã chọn
        if ($validated['payment_method'] === 'cash') {
            // Xử lý thanh toán qua tiền mặt (COD)
            return response()->json(['message' => 'Thanh toán qua tiền mặt thành công!', 'payment' => $payment]);
        } elseif ($validated['payment_method'] === 'momo') {
            // Xử lý thanh toán qua MoMo
            return $this->handleMoMoPayment($payment);
        }

        return response()->json(['message' => 'Phương thức thanh toán không hợp lệ!'], 400);
    }

    private function handleMoMoPayment($payment)
    {
        // Tích hợp với MoMo API để thực hiện thanh toán
        // Gửi thông tin đến MoMo và nhận phản hồi (mã giả)
        $momoResponse = $this->processMoMoPayment($payment->amount);

        if ($momoResponse['status'] === 'success') {
            // Cập nhật trạng thái thanh toán
            $payment->update(['status' => 'completed']);
            return response()->json(['message' => 'Thanh toán qua MoMo thành công!', 'payment' => $payment]);
        }

        return response()->json(['message' => 'Thanh toán MoMo không thành công'], 500);
    }

    private function processMoMoPayment($amount)
    {
        // API call giả lập MoMo
        return ['status' => 'success', 'transaction_id' => 'MO123456789'];
    }
}
