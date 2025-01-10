<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {

        if ($request->keyword_blog) {
            $slug_title = Str::slug($request->keyword_blog);
            $blogs = Blog::where('content', 'like', "%$request->keyword_blog%")
                ->orwhere('author', 'like', "%$request->keyword_blog%")
                ->orwhere('slug', 'like', "%$slug_title%")->paginate(10);
        } else
            $blogs = Blog::paginate(10);
        return view('Template.pages.blog')->with('blogs', $blogs);
    }
    public function show($slug)
    {
        $blog = Blog::where('slug',$slug)->first();
        return view('Template.pages.blog_single')->with('blog',$blog);
    }
}
