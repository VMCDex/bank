@extends('layouts.app')
@section('title', 'Добавление продукта')
@section('content')
<style>
.corporate-font,
.corporate-font h1,
.corporate-font label,
.corporate-font input,
.corporate-font textarea,
.corporate-font button,
.corporate-font a {
    font-family: 'Roboto', sans-serif !important;
}

.product-form {
    max-width: 600px;
    margin: 30px auto;
    padding: 30px;
    background: white;
    border-radius: 12px;
    box-shadow:
        0 4px 6px -1px rgba(0, 0, 0, 0.1),
        0 8px 15px -3px rgba(0, 0, 0, 0.08),
        0 12px 20px -5px rgba(0, 0, 0, 0.05);
    transition: box-shadow 0.3s ease;
}
.product-form:hover {
    box-shadow:
        0 6px 8px -1px rgba(0, 0, 0, 0.12),
        0 10px 20px -3px rgba(0, 0, 0, 0.1),
        0 14px 25px -5px rgba(0, 0, 0, 0.07);
}

/* Стили кнопок с объёмом */
.btn-primary {
    background: linear-gradient(135deg, #27ae60, #219a52);
    color: white;
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 500;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 6px rgba(39, 174, 96, 0.3);
    position: relative;
    overflow: hidden;
}
.btn-primary::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 5px;
    height: 5px;
    background: rgba(255, 255, 255, 0.5);
    opacity: 0;
    border-radius: 100%;
    transform: scale(1, 1) translate(-50%);
    transform-origin: 50% 50%;
}
.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 12px rgba(39, 174, 96, 0.4);
}
.btn-primary:active {
    transform: translateY(0);
    box-shadow: 0 2px 4px rgba(39, 174, 96, 0.3);
}
.btn-primary:focus::after {
    animation: ripple 1s ease-out;
}
@keyframes ripple {
    0% {
        transform: scale(0, 0);
        opacity: 0.4;
    }
    20% {
        transform: scale(40, 40);
        opacity: 0.1;
    }
    100% {
        opacity: 0;
        transform: scale(40, 40);
    }
}

.btn-secondary {
    background: linear-gradient(135deg, #95a5a6, #7f8c8d);
    color: white;
    padding: 12px 24px;
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 6px rgba(149, 165, 166, 0.3);
    display: inline-block;
    text-align: center;
}
.btn-secondary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 12px rgba(149, 165, 166, 0.4);
}
.btn-secondary:active {
    transform: translateY(0);
    box-shadow: 0 2px 4px rgba(149, 165, 166, 0.3);
}

/* Сообщение об успехе */
.alert-success {
    background: #d4edda;
    color: #155724;
    padding: 14px;
    border-radius: 8px;
    margin-bottom: 24px;
    border-left: 4px solid #27ae60;
}

/* Ошибки валидации */
.error-text {
    color: #e74c3c;
    font-size: 0.85rem;
    margin-top: 6px;
    font-weight: 400;
}

/* Стили полей формы */
.form-group {
    margin-bottom: 20px;
}
label {
    display: block;
    font-weight: 500;
    margin-bottom: 8px;
    color: #2c3e50;
}
.form-control {
    width: 100%;
    padding: 12px 16px;
    border: 1px solid #bdc3c7;
    border-radius: 8px;
    font-size: 14px;
    transition: all 0.3s ease;
    box-sizing: border-box;
}
.form-control:focus {
    outline: none;
    border-color: #3498db;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.15);
}
textarea.form-control {
    min-height: 100px;
    resize: vertical;
}

/* Заголовок */
h1 {
    color: #2c3e50;
    text-align: center;
    margin-bottom: 24px;
    font-size: 26px;
    font-weight: 600;
}

/* Группа кнопок */
.form-actions {
    display: flex;
    gap: 16px;
    justify-content: flex-end;
    margin-top: 28px;
}
</style>

<div class="corporate-font">
    <div class="product-form">
        <h1>Добавить новый продукт</h1>


        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif


        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Тип продукта -->
            <div class="form-group">
                <label>Тип продукта</label>
                @foreach(['Кредиты', 'Карты', 'Вклады'] as $productType)
                    <div class="radio">
                        <label>
                    <input type="radio" name="type" value="{{ $productType }}"
                        {{ old('type') == $productType ? 'checked' : '' }} required>
                    {{ $productType }}
                </label>
                    </div>
                @endforeach
            </div>

            <!-- Название -->
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" id="name" name="name" class="form-control" required>
                @error('name')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- Краткое описание -->
            <div class="form-group">
                <label for="short_description">Краткое описание</label>
                <textarea id="short_description" name="short_description" class="form-control" rows="3"></textarea>
                @error('short_description')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- Полное описание -->
            <div class="form-group">
                <label for="full_description">Полное описание</label>
                <textarea id="full_description" name="full_description" class="form-control" rows="5"></textarea>
                @error('full_description')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- Загрузка изображения -->
            <div class="form-group">
                <label for="image">Изображение (JPG, JPEG, PNG, WEBP, до 2 МБ)</label>
                <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png,.webp" class="form-control" onchange="validateImage(this)">
                <small style="color: #7f8c8d; display: block; margin-top: 8px;">Поддерживаемые форматы: JPG, JPEG, PNG, WEBP. Максимальный размер: 2 МБ</small>
                @error('image')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- Кнопки действий -->
            <div class="form-actions">
                <a href="{{ route('admin.products.index') }}" class="btn-secondary">Отмена</a>
                <button type="submit" class="btn-primary">Добавить продукт</button>
            </div>
        </form>
    </div>
</div>

<script>
function validateImage(input) {
    const file = input.files[0];
    if (!file) return;

    // Проверка размера
    const maxSize = 2 * 1024 * 1024;
    if (file.size > maxSize) {
        alert('Файл слишком большой. Максимальный размер — 2 МБ.');
        input.value = '';
        return;
    }

    // Проверка формата
    const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
    if (!allowedTypes.includes(file.type)) {
        alert('Неподдерживаемый формат файла. Разрешены: JPG, JPEG, PNG, WEBP.');
        input.value = '';
    }
}
</script>
@endsection
