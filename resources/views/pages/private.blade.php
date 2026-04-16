@extends('layouts.app')
@section('content')
<style>
.new-offers {
    padding: 60px 0;
    background: #f8f9fa;
}

.section-title {
    text-align: center;
    font-size: 2rem;
    margin-bottom: 20px;
    color: #2c3e50;
}

.section-title1 {
    text-align: center;
    font-size: 1rem;
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

.product-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
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
</style>
<section class="new-offers">
    <div class="container">
        <h2 class="section-title">Частным лицам</h2>
        <p class="section-title1">Выберите подходящее финансовое решение для ваших целей</p>

        <div class="products-grid">
            <!-- Карточка 1 -->
            <div class="product-card">
                <h3 class="product-title">Кредиты</h3>
                <p class="product-description">Гибкие условия кредитования на любые цели. Низкие процентные ставки и быстрое одобрение.</p>
                <a href="{{ route('loans') }}" class="product-link">Подробнее</a>
            </div>

            <!-- Карточка 2 -->
            <div class="product-card">
                <h3 class="product-title">Вклады</h3>
                <p class="product-description">Надёжное сохранение и приумножение средств. Доходность до 12 % годовых.</p>
                <a href="{{ route('deposits') }}" class="product-link">Подробнее</a>
            </div>

            <!-- Карточка 3 -->
            <div class="product-card">
                <h3 class="product-title">Карты</h3>
                <p class="product-description">Удобные платёжные инструменты с кэшбэком и бонусами. Обслуживание от 0 рублей.</p>
                <a href="{{ route('cards') }}" class="product-link">Подробнее</a>
            </div>
        </div>
    </div>
</section>
@endsection