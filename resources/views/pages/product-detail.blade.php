@extends('layouts.app')
@section('content')
<style>
    .detail-card {
        max-width: 800px;
        margin: 40px auto;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        position: relative
    }

    .detail-card .card-image img {
        width: 100%;
        height: 320px;
        object-fit: cover;
    }

    .detail-card .card-content {
        padding: 30px;
    }

    .detail-card .product-title {
        font-size: 1.8rem;
        margin-bottom: 15px;
        color: #333;
    }

    .detail-card .product-type {
        color: #007bff;
        font-weight: bold;
        margin-bottom: 20px;
        display: block;
    }

    .detail-card .full-description {
        color: #666;
        line-height: 1.6;
    }

    .back-link {
        display: inline-block;
        margin-top: 20px;
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
    }

    .back-link:hover {
        text-decoration: underline;
    }

        .application-cta {
            position: absolute;
            bottom: 20px;      
            right: 30px;  
            z-index: 10; 
        }

        .btn-apply-modern {
            background: linear-gradient(135deg, #667eea 0%, #764ba1 100%);
            color: white;
            border: none;
            padding: 12px 24px; 
            font-size: 15px;
            font-weight: 600;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-apply-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }

        .btn-apply-modern:active {
            transform: translateY(0);
        }

        /* Анимация при наведении (волна) */
        .btn-apply-modern::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.3s, height 0.3s;
        }

        .btn-apply-modern:hover::after {
            width: 300px;
            height: 300px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background: linear-gradient(145deg, #ffffff, #f8f9fa);
            margin: 5% auto;
            padding: 40px;
            border-radius: 20px;
            max-width: 520px;
            width: 90%;
            position: relative;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .close {
            color: #6c757d;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s;
            background: rgba(255, 255, 255, 0.8);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: -20px;
            right: -20px;
        }

        .close:hover {
            color: #007bff;
            transform: rotate(90deg);
        }

        /* Стили формы внутри модального окна */
        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #495057;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            box-sizing: border-box;
            font-size: 16px;
            transition: all 0.3s;
            background: #fff;
        }

        .form-group input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
            transform: translateY(-1px);
        }

        /* Сообщения об ошибках */
        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 5px;
            display: none;
        }

        /* Уведомления (успех/ошибка) */
        .notification {
            padding: 18px 24px;
            border-radius: 12px;
            margin-top: 20px;
            text-align: center;
            font-weight: 500;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .success {
            background: linear-gradient(135deg, #a8e6cf 0%, #dcedc1 100%);
            color: #2e7d32;
            border: 1px solid #81c784;
        }

        .error {
            background: linear-gradient(135deg, #ff8181 0%, #ff5252 100%);
            color: #c62828;
            border: 1px solid #f44336;
        }

        /* Кнопка отправки в форме */
        .btn-submit {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            border: none;
            padding: 14px 24px;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            width: 100%;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.5);
        }

        .btn-submit:disabled {
            background: #6c757d;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
</style>

<div class="detail-card">
    <div class="card-image">
        @if(!empty($product->image_path))
            <img src="{{ asset($product->image_path) }}"
                 alt="{{ $product->name }}">
        @else
            <img src="https://via.placeholder.com/600x320?text=Изображение+недоступно"
                 alt="Изображение продукта">
        @endif
    </div>

    <div class="card-content">
        <h1 class="product-title">{{ $product->name }}</h1>
        <span class="product-type">{{ $product->type }}</span>

        <div class="full-description">
            {!! nl2br(e($product->full_description)) !!}
        </div>

        <a href="{{ url()->previous() }}" class="back-link">
            ← Назад к списку продуктов
        </a>
    </div>
    <!-- Кнопка открытия модального окна -->
<div class="application-cta">
    <button type="button" class="btn-apply-modern" onclick="openApplicationModal()">
        Подать заявку на продукт
    </button>
</div>

<!-- Модальное окно -->
<div id="applicationModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeApplicationModal()">&times;</span>
        <h2>Заявка на {{ $product->name }}</h2>
        
        <form id="applicationForm">
            <div class="form-group">
                <label for="lastName">Фамилия *</label>
                <input type="text" id="lastName" name="lastName" required>
            </div>
            
            <div class="form-group">
                <label for="firstName">Имя *</label>
                <input type="text" id="firstName" name="firstName" required>
            </div>
            <div class="form-group">
                <label for="middleName">Отчество</label>
                <input type="text" id="middleName" name="middleName">
            </div>
            <div class="form-group">
                <label for="phone">Телефон *</label>
                <input type="tel" id="phone" name="phone" required>
                <div id="phoneError" class="error-message"></div>
            </div>
            
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            
            <button type="submit" class="btn-submit">Отправить заявку</button>
        </form>
        
        <!-- Уведомления -->
        <div id="successMessage" class="notification success" style="display: none;">
        </div>
        <div id="errorMessage" class="notification error" style="display: none;">
        </div>
    </div>
</div>
</div>
<script>
// Функции для управления модальным окном
function openApplicationModal() {
    document.getElementById('applicationModal').style.display = 'block';
}

function closeApplicationModal() {
    document.getElementById('applicationModal').style.display = 'none';
    // Очищаем форму и уведомления
    document.getElementById('applicationForm').reset();
    hideNotifications();
}

// Закрытие по клику вне окна
window.addEventListener('click', function(event) {
    const modal = document.getElementById('applicationModal');
    if (event.target === modal) {
        closeApplicationModal();
    }
});

// Валидация телефона
function validatePhone(phone) {
    // Регулярное выражение для российского телефона: +7 (XXX) XXX-XX-XX или 8 (XXX) XXX-XX-XX
    const phoneRegex = /^(\+7|8)[\s\-]?\(?[0-9]{3}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/;
    return phoneRegex.test(phone);
}

// Показать/скрыть сообщения
function showSuccess() {
    const successEl = document.getElementById('successMessage');
    successEl.style.display = 'block';
    successEl.textContent = 'Заявка отправлена успешно!';

    // Автоматически скрываем через 3 секунды
    setTimeout(() => {
        successEl.style.display = 'none';
    }, 3000);
}

function showError(message) {
    const errorEl = document.getElementById('errorMessage');
    errorEl.textContent = message;
    errorEl.style.display = 'block';
}

function hideNotifications() {
    const successEl = document.getElementById('successMessage');
    const errorEl = document.getElementById('errorMessage');

    if (successEl) successEl.style.display = 'none';
    if (errorEl) errorEl.style.display = 'none';
}

// Обработка отправки формы
function handleApplicationSubmit(event) {
    event.preventDefault();

    // Скрываем предыдущие уведомления
    hideNotifications();

    // Получаем значения полей
    const lastName = document.getElementById('lastName').value.trim();
    const firstName = document.getElementById('firstName').value.trim();
    const middleName = document.getElementById('middleName').value.trim();
    const phone = document.getElementById('phone').value.trim();

    let isValid = true;

    // Проверка заполнения обязательных полей
    if (!lastName) {
        isValid = false;
        showError('Заполните поле "Фамилия"');
        return;
    }

    if (!firstName) {
        isValid = false;
        showError('Заполните поле "Имя"');
        return;
    }

    // Валидация телефона
    if (!validatePhone(phone)) {
        isValid = false;
        showError('Введите корректный номер телефона');
        return;
    }

    if (isValid) {
        // Собираем данные
        const formData = {
            lastName: lastName,
            firstName: firstName,
            middleName: middleName,
            phone: phone,
            product_id: document.querySelector('input[name="product_id"]').value
        };

        // Имитация отправки email (заглушка)
        console.log('Отправка заявки:', formData);

        showSuccess();

        setTimeout(() => {
            closeApplicationModal();
        }, 4000); 
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('applicationForm');
    form.addEventListener('submit', handleApplicationSubmit);
});
</script>
@endsection
