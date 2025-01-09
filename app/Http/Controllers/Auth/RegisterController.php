<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    // Hiển thị trang đăng ký (nếu cần)
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        // Xác thực dữ liệu
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|unique:users,firstName|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'phone' => 'nullable|numeric',
            'password' => 'required|min:6|confirmed', // 'confirmed' yêu cầu có trường 'password_confirmation'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Lưu thông tin người dùng vào cơ sở dữ liệu
        $user = User::create([
            'firstName' => $request->firstName,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password), // Mã hóa mật khẩu
        ]);

        // Đăng nhập người dùng ngay lập tức (tuỳ chọn)
        //auth()->login($user);

        return redirect()->route('index')->with('success', 'Registration successful!');
    }
}
