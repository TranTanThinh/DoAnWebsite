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

@if (isset($blog))
<div class="blog-post">
    <h3 class="blog-title">{{ $blog->title }}</h3>
    <p class="blog-author"><strong>Author:</strong> {{ $blog->author }}</p>
    <img src="{{ asset('Template/images/' . $blog->image) }}" alt="{{ $blog->title }}" class="blog-image">
    <p class="blog-content">{{ Str::limit($blog->content, 150) }}</p>
    <p class="blog-view"><strong>Lượt xem:</strong> {{ $blog->view }}</p>
</div>
@endif

@endsection
