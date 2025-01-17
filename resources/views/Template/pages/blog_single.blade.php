@extends('Template.layouts.app')
@section('title', 'Blog')
@section('main')
<style>
  /* Định dạng cho toàn bộ blog-post */
.blog-post {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Định dạng tiêu đề bài viết */
.blog-title {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

/* Định dạng tác giả */
.blog-author {
    font-size: 16px;
    color: #555;
    margin-bottom: 15px;
}

/* Định dạng ảnh bài viết */
.blog-image {
    width: 100%;
    max-width: 300px;
    height: auto;
    border-radius: 4px;
    margin-bottom: 15px;
}


.blog-content {
    font-size: 14px;
    color: #666;
    line-height: 1.6;
    margin-bottom: 15px;
}


.blog-view {
    font-size: 14px;
    color: #777;
}

</style>



@endsection
