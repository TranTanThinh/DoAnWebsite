<?php


namespace App\Http\Controllers;
use App\Models\Slideshow;
use Illuminate\Http\Request;

class SlideshowContronler extends Controller
{
    public function index()
    {
        // Lấy tất cả các sản phẩm trong bảng slideshow
        $slides = Slideshow::all();

        // Trả về view và truyền dữ liệu
        return view('slideshow.index', compact('slides'));
    }
}
