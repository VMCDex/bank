<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Кубань Кредит</title>

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .site-header {
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .header-logo {
            display: flex;
            align-items: center; 
            gap: 15px; 
        }

        .main-navigation ul {
            display: flex;
            gap: 30px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .menu-link {
            text-decoration: none;
            color: #333;
            font-weight: 700;
            padding: 8px 12px;
            border-radius: 4px;
            transition: color 0.3s, background-color 0.3s;
        }

        .menu-link:hover {
            color: #3498db;
            background-color: #f8f9fa;
        }

        /* Выпадающее меню */
        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 70px;
            background: white;
            min-width: 200px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1001;
        }

        .has-dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-link {
            display: block;
            padding: 12px 15px;
            text-decoration: none;
            color: #333;
            font-weight: 700;
        }

        .dropdown-link:hover {
            background-color: #e7f3ff;
            color: #2980b9;
        }

        /* Футер */
        .site-footer {
            background: #2c3e50;
            color: #ecf0f1;
            padding: 1px 0 10px;
            margin-top: 60px;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 40px;
        }

        .contact-details h3 {
            font: 700 1.5rem/1 'Arial', sans-serif;
            margin-bottom: 20px;
            color: #3498db;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            line-height: 1.6;
        }

        .contact-item strong {
            min-width: 80px;
            color: #bdc3c7;
        }

        .contact-link {
            color: #ecf0f1;
            text-decoration: underline;
            transition: color 0.3s;
        }

        .contact-link:hover {
            color: #3498db;
            text-decoration: none;
        }

        .copyright-bar {
            background: #1f2b37; 
            padding: 1px 33px;
            text-align: left;
            color: #ecf0f1;
            font-size: 0.9rem;
        }

        /* Планшеты (768px — 1024px) */
@media (max-width: 1024px) {
    .header-container {
        padding: 8px 15px;
    }

    .main-navigation ul {
        gap: 20px;
    }

    .menu-link {
        padding: 6px 10px;
        font-size: 14px;
    }

    /* Центрирование элементов футера */
    .footer-container {
        grid-template-columns: 1fr;
        gap: 30px;
        padding: 0 15px;
        text-align: center;
    }

    .contact-details h3 {
        font-size: 1.3rem;
        text-align: center;
    }

    .contact-item {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .contact-item strong {
        min-width: auto;
    }
}

/* Мобильные устройства (до 767px) */
@media (max-width: 767px) {
    .header-container {
        flex-direction: column;
        gap: 15px;
        padding: 10px 15px;
        text-align: center;
    }

    .main-navigation {
        width: 100%;
    }

    .main-navigation ul {
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
    }

    .menu-link {
        padding: 8px 12px;
        font-size: 13px;
        text-align: center;
    }

    /* Скрываем выпадающее меню на мобильных */
    .dropdown-menu {
        display: none;
    }

    .has-dropdown:hover .dropdown-menu {
        opacity: 0;
        visibility: hidden;
    }

    /* Футер — полное центрирование */
    .footer-container {
        flex-direction: column;
        gap: 25px;
        padding: 0 15px;
        text-align: center;
    }

    .contact-details h3 {
        font-size: 1.2rem;
        margin-bottom: 15px;
        text-align: center;
    }

    .contact-item {
        flex-direction: column;
        align-items: center;
        gap: 5px;
        text-align: center;
    }

    .contact-item strong {
        min-width: auto;
        text-align: center;
    }

    .copyright-bar {
        padding: 10px 15px;
        text-align: center;
    }

    .copyright {
        font-size: 0.8rem;
    }
}

/* Очень маленькие экраны (до 480px) */
@media (max-width: 480px) {
    .header-container {
        padding: 8px 10px;
    }

    .main-navigation ul {
        gap: 8px;
    }

    .menu-link {
        padding: 6px 8px;
        font-size: 12px;
    }

    /* Дополнительные корректировки футера для очень маленьких экранов */
    .contact-details h3 {
        font-size: 1.1rem;
    }

    .contact-item {
        gap: 4px;
    }

    .copyright {
        font-size: 0.7rem;
    }
}
    </style>
</head>
<body class="bg-white">
    <!-- Хедер -->
    <header class="site-header">
        <div class="header-container">
            <div class="header-logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/g.png') }}" alt="Логотип банка" width="120" height="50">
                </a>
            </div>

            <!-- Навигационное меню -->
            <nav class="main-navigation">
                <ul>
                    <li class="has-dropdown">
                        <a href="{{ route('private') }}" class="menu-link">Частным лицам</a>
                        <ul class="dropdown-menu">
                    <li><a href="{{ route('loans') }}" class="dropdown-link">Кредиты</a></li>
            <li><a href="{{ route('deposits') }}" class="dropdown-link">Вклады</a></li>
            <li><a href="{{ route('cards') }}" class="dropdown-link">Карты</a></li>
                </ul>
            </li>
            <li><a href="{{ route('business') }}" class="menu-link">Бизнес</a></li>
            <li><a href="{{ route('about') }}" class="menu-link">О Банке</a></li>
        </ul>
            </nav>
        </div>
    </header>

    <hr class="w-full border-t border-gray-300 mt-0">

    <main>
        @yield('content')
    </main>

    <!-- Футер -->
    <footer class="site-footer">
        <div class="footer-container">
            <div class="contact-details">
                <h3>
                    <a href="{{ route('login') }}" class="contact-link">Контакты</a>
                </h3>
                <div class="contact-item">
            <strong>Телефон:</strong>
            <a href="tel:+74951234567" class="contact-link">+7 (495) 123-45-67</a>
        </div>
        <div class="contact-item">
            <strong>Email:</strong>
            <a href="mailto:info@bank.ru" class="contact-link">info@bank.ru</a>
        </div>
        <div class="contact-item">
            <strong>Адрес:</strong> г. Москва, ул. Примерная, д. 1
        </div>
            </div>
        </div>
    </footer>

    <div class="copyright-bar">
        <div class="container">
            <p class="copyright">&copy; 2026 Кубань Кредит. Все права защищены.</p>
        </div>
    </div>

<script>

</script>
</body>
</html>
