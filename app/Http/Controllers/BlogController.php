<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // Lấy danh sách các blog từ cơ sở dữ liệu
        $blogs = Blog::select('title', 'image', 'club')->get();
        
        // Truyền dữ liệu đến view
        return view('blog.index', compact('blogs'));
    }
}
