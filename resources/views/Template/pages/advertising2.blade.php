@extends('Template.layouts.app')
@section('title', 'Blog')
@section('main')
<style>


.image {
    width: 1000%; 
    max-width: 1000px; 
    height: auto; 
    border-radius: 8px;
    margin-bottom: 15px;
    object-fit: cover; 
    display: block; 
}


.promotional-info {
    position: absolute;
    bottom: 20px; 
    left: 20px;
    background-color: rgba(0, 0, 0, 0.5); 
    color: white;
    padding: 20px;
    border-radius: 5px;
    font-size: 18px;
    font-weight: bold;
    width: 60%; 
}

.promotional-info h3 {
    font-size: 20px; 
    margin-bottom: 10px;
}

.promotional-info p {
    font-size: 16px; 
    margin-bottom: 10px;
}



.blog-post {
    position: relative; 
    overflow: hidden;
    max-width: 100%; 
}


</style>

<div class="blog-post">
    <img src="{{ asset('Template/images/bg_2.jpg') }}" alt="Description of Image" class="image">
    
    <div class="promotional-info">
        <h3>Rau Quả Organic Tươi Mới 100%</h3>
        <p>Rau quả nhập khẩu đảm bảo các tiêu chuẩn an toàn quốc tế!</p>
    </div>
    
    
</div>





@endsection
