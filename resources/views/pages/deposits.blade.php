@extends('layouts.app')
@section('content')
<style>
.product-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 20px;
  padding: 20px;
  max-width: 1200px;
  margin: 0 auto;
}

.product-card {
  background: white;
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.product-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}


.card-image {
  width: 100%;
  height: 160px;
  background-color: #f8f9fa; 
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}

.card-image img {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
  display: block;
}

.card-content {
  padding: 20px;
}

.product-title {
  font-size: 1.3rem;
  margin-bottom: 10px;
  color: #333;
}

.product-description {
  color: #666;
  line-height: 1.5;
  margin-bottom: 15px;
}

.btn-details {
  display: inline-block;
  padding: 10px 20px;
  background-color: #007bff;
  color: white;
  text-decoration: none;
  border-radius: 5px;
  font-weight: bold;
  text-align: center;
  transition: background-color 0.3s ease;
}

.btn-details:hover {
  background-color: #0056b3;
  text-decoration: none;
}

/* Адаптивность */
@media (max-width: 768px) {
  .product-grid {
    grid-template-columns: 1fr;
    padding: 15px;
  }
  
  header {
    padding: 30px 15px;
  }
}

@media (max-width: 480px) {
  .product-card {
    margin: 0 10px;
  }
  
  .card-content {
    padding: 15px;
  }
  
  .product-title {
    font-size: 1.1rem;
  }
}

/* Стили для детальных страниц (если нужно) */
.detail-card {
  max-width: 800px;
  margin: 40px auto;
  background: white;
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  overflow: hidden;
}

.detail-card .card-image img {
  width: 100%;
}

.detail-card .card-content {
  padding: 30px;
}

.detail-card .product-title {
  font-size: 1.8rem;
  margin-bottom: 15px;
}

</style>
<section>
   <div class="product-grid">
        @if($deposits->isEmpty())
            <p>В данный момент вклады не доступны.</p>
        @else
            @foreach($deposits as $deposit)
                <div class="product-card">
                    <div class="card-image">
                        @if(!empty($deposit->image_path))
                            <img src="{{ asset($deposit->image_path) }}"
                         alt="{{ $deposit->name }}">
                @else
                    <img src="https://via.placeholder.com/300x160"
                 alt="Изображение недоступно">
            @endif
            </div>
            <div class="card-content">
                <h3 class="product-title">{{ $deposit->name }}</h3>
                <p class="product-description">{{ $deposit->short_description }}</p>
                <a href="{{ route('product.detail', $deposit->id) }}"
                  class="btn-details">Подробнее</a>
            </div>
        </div>
    @endforeach
@endif
    </div>
</section>
@endsection