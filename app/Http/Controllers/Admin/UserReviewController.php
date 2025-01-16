<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserReview; // Model tương ứng

class UserReviewController extends Controller
{
    public function index()
    {
        // Lấy tất cả dữ liệu từ bảng user_review
        $reviews = UserReview::all();
        // Trả dữ liệu về view
        return view('Dashboard.pages.user_reviews.listreview', compact('reviews'));
    }

    public function destroy($id)
    {
        // Tìm review theo ID và xóa
        $review = UserReview::findOrFail($id);
        $review->delete();
    
        // Chuyển hướng về trang danh sách với thông báo
        return redirect()->route('user_reviews.index')->with('success', 'Review deleted successfully.');
    }

}