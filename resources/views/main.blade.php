@extends('layouts.app')
@section('content')
<style>
    .banner-slider {
    position: relative;
    width: 100%;
    height: 400px;
    overflow: hidden;
    }

    .slider-container {
        width: 100%;
        height: 100%;
    }

    .slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 0.5s ease;
    }

    .slide::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        z-index: 1;
    }

    .slide.active {
        opacity: 1;
    }

    .slide img {
       width: 100%;
        height: 100%;
        object-fit: cover; 
        object-position: center;
        display: block;
    }

    .slide-content {
        position: absolute;
        bottom: 40px;
        left: 40px;
        color: white;
        max-width: 400px;
        z-index: 2;
    }

    .slide h2 {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .slide p {
        font-size: 1.1rem;
        margin-bottom: 20px;
    }

    .btn {
        display: inline-block;
        padding: 12px 24px;
        background: #3498db;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-weight: 500;
    }

    .btn:hover {
        background: #2980b9;
    }

    .slider-nav {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 10px;
        z-index: 2;
    }

    .nav-dot {
        width: 12px;
        height: 12px;
        border: none;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        cursor: pointer;
    }

    .nav-dot.active {
        background: white;
    }

    /* Новые предложения */
    .new-offers {
        padding: 60px 0;
        background: #f8f9fa;
    }

    .section-title {
        text-align: center;
        font-size: 2rem;
        margin-bottom: 40px;
        color: #2c3e50;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        padding: 0 15px;
    }

    .product-card {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }

    .image-container {
        width: 100%;
        height: 160px;
        background-color: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .product-image {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover; /* обрезает края, сохраняет пропорции */
        display: block;
    }


    .product-title {
        font-size: 1.3rem;
        margin: 20px 15px 10px;
        color: #2c3e50;
    }

    .product-description {
        margin: 0 15px 20px;
        line-height: 1.5;
        color: #555;
    }

    .product-link {
        display: block;
        text-align: center;
        padding: 12px;
        color: #3498db;
        text-decoration: none;
        border-top: 1px solid #eee;
        font-weight: 500;
        transition: background-color 0.3s, color 0.3s;
    }

    .product-link:hover {
        background-color: #f8f9fa;
        color: #2980b9;
    }
    
    /* Адаптивность для мобильных устройств (до 767px) */
    @media (max-width: 767px) {
        .banner-slider {
            height: 250px;
            overflow: hidden; 
            position: relative; /
        }

        .slide-content {
            bottom: 25px; 
            left: 15px;
            right: 15px;
            max-width: none;
        }

        .btn {
            display: block;
            width: 30%;
            text-align: center;
            padding: 12px;
            font-size: 0.85rem;
            box-sizing: border-box; 
            margin-bottom: 10px; 
        }

        .slider-nav {
            position: absolute;
            bottom: 15px; 
            left: 50%;
            transform: translateX(-50%); 
            display: flex;
            gap: 8px;
            z-index: 3; 
        }

        .nav-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            opacity: 0.9;
        }

        .nav-dot.active {
            background: white;
            transform: scale(1.1); 
        }

        .slide::before {
            background: rgba(0, 0, 0, 0.3);
        }

        .slide h2 {
            font-size: 1.5rem;
            margin-bottom: 8px;
        }

        .slide p {
            font-size: 0.9rem;
            margin-bottom: 15px;
        }
    }

    /* Очень маленькие экраны (до 480px) — дополнительные корректировки */
    @media (max-width: 480px) {
        .banner-slider {
            height: 220px;
        }

        .slide-content {
            bottom: 30px; 
            left: 10px;
            right: 10px;
        }

        .slider-nav {
            bottom: 12px; 
            gap: 6px;
        }

        .nav-dot {
            width: 8px;
            height: 8px;
        }

        .btn {
            padding: 10px;
            font-size: 0.8rem;
        }

        .slide h2 {
            font-size: 1.3rem;
        }

        .slide p {
            font-size: 0.8rem;
        }
    }
</style>
<section class="banner-slider">
    <div class="slider-container">
        <!-- Слайд 1 -->
        <div class="slide active">
            <img src="{{ asset('images/22.jpg') }}" alt="Акция: Вклады с повышенной ставкой">
            <div class="slide-content">
                <h2>Вклады с повышенной ставкой</h2>
                <p>До 12 % годовых на срок от 6 месяцев</p>
                <a href="{{ route('deposits') }}" class="btn">Открыть вклад</a>
            </div>
        </div>

        <!-- Слайд 2 -->
        <div class="slide">
            <img src="{{ asset('images/44.jpg') }}" alt="Кредитная карта с кэшбэком" >
            <div class="slide-content">
                <h2>Кредитная карта с кэшбэком</h2>
                <p>Кэшбэк до 5 % на все покупки</p>
                <a href="{{ route('cards') }}" class="btn">Оформить карту</a>
            </div>
        </div>

        <!-- Слайд 3 -->
        <div class="slide">
            <img src="{{ asset('images/66.png') }}" alt="Ипотека без первого взноса">
            <div class="slide-content">
                <h2>Ипотека без первого взноса</h2>
                <p>Ставка от 8 % на срок до 30 лет</p>
                <a href="{{ route('loans') }}" class="btn">Подать заявку</a>
            </div>
        </div>
    </div>

    <!-- Навигация слайдера -->
    <div class="slider-nav">
        <button class="nav-dot active" data-slide="0"></button>
        <button class="nav-dot" data-slide="1"></button>
        <button class="nav-dot" data-slide="2"></button>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.nav-dot');
    let currentSlide = 0;

    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));

        slides[index].classList.add('active');
        dots[index].classList.add('active');
        currentSlide = index;
    }

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => showSlide(index));
    });

    // Автопереключение слайдов каждые 5 секунд
    setInterval(() => {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }, 5000);
});
</script>
<section class="new-offers">
    <div class="container">
        <h2 class="section-title">Новые предложения</h2>

        <div class="products-grid">
            @if(isset($latestProducts) && !$latestProducts->isEmpty())
                @foreach($latestProducts as $product)
                    <div class="product-card">
                        <div class="image-container">
                            @if(!empty($product->image_path))
                                <img src="{{ asset($product->image_path) }}"
                                    alt="{{ $product->name }}"
                                    class="product-image">
                    @endif
                </div>
                <h3 class="product-title">{{ $product->name }}</h3>
                <p class="product-description">{{ $product->short_description }}</p>
                <a href="{{ route('product.detail', $product->id) }}" class="product-link">Подробнее</a>
            </div>
        @endforeach
        @endif
        </div>

</section>
@endsection