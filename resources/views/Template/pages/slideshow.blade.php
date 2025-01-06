<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Slideshow</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .slideshow-container {
            position: relative;
            max-width: 100%;
            margin: auto;
        }

        .slide {
            display: none;
        }

        .slide img {
            width: 100%;
            height: auto;
        }

        .slideshow-container .text {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-size: 20px;
            padding: 8px 12px;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .active {
            display: block;
        }
    </style>
</head>
<body>

<div class="slideshow-container">
    @foreach($products as $product)
        <div class="slide">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            <div class="text">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <p>Price: ${{ number_format($product->price, 2) }}</p>
                <a href="{{ route('products.show', $product->slug) }}">View Details</a>
            </div>
        </div>
    @endforeach
</div>

<script>
    let index = 0;
    const slides = document.querySelectorAll('.slide');
    function showSlides() {
        for (let i = 0; i < slides.length; i++) {
            slides[i].classList.remove('active');
        }
        index++;
        if (index > slides.length) { index = 1 }
        slides[index - 1].classList.add('active');
        setTimeout(showSlides, 5000); // Chuyển slide mỗi 5 giây
    }
    showSlides();
</script>

</body>
</html>
