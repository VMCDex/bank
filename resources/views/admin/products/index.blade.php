@extends('layouts.app')

@section('title', 'Управление продуктами')
<style>
    .custom-pagination {
        display: flex;
        gap: 8px; 
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .page-number, .current-page {
        font-weight: 500; 
        text-decoration: none;
    }

    .page-number {
        color: #007bff; 
        padding: 4px 8px;
        border-radius: 4px;
    }

    .current-page {
        background-color: #007bff; 
        color: white; 
        padding: 6px 10px;
        border-radius: 4px;
    }

        /* Адаптивность для планшетов (768px — 1024px) */
        @media (max-width: 1024px) {
            .page-number, .current-page {
                padding: 3px 6px;
                font-size: 13px;
            }

            table {
                font-size: 14px;
            }

            th, td {
                padding: 10px 8px;
            }
        }

        /* Адаптивность для мобильных устройств (до 767px) */
        @media (max-width: 767px) {
            body {
                padding: 0;
            }

            .custom-pagination {
                flex-wrap: wrap;
                justify-content: center;
            }

            /* Перестройка верхней панели в столбец */
            [style*="display: flex; justify-content: space-between"] {
                display: block !important;
            }

            h1 {
                text-align: center !important;
                margin-bottom: 15px !important;
            }

            [style*="display: flex; gap: 12px"] {
                display: flex !important;
                flex-direction: column !important;
                align-items: stretch !important;
                gap: 10px !important;
            }

            a[href*="admin.settings.index"],
            a[href*="admin.products.create"] {
                display: block !important;
                text-align: center !important;
                min-width: auto !important;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2) !important;
            }

            button[type="submit"] {
                width: 100% !important;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2) !important;
            }

            select[name="type"] {
                width: 100% !important;
                padding: 12px !important;
                font-size: 16px !important;
            }

            label[for="type"] {
                display: block !important;
                margin-bottom: 8px !important;
                font-size: 14px !important;
            }

            /* Таблица переделана в список карточек */
            table, thead, tbody, th, td, tr {
                display: block !important;
                width: 100% !important;
            }

            thead {
                display: none !important; 
            }

            tr {
                border: 1px solid #ecf0f1 !important;
                border-radius: 8px !important;
                margin-bottom: 15px !important;
                padding: 15px !important;
                background: #f8f9fa !important;
            }

            td {
                border: none !important;
                position: relative !important;
                padding: 8px 0 !important;
                text-align: left !important;
            }

            /* Метки для полей в мобильной версии */
            td:before {
                content: attr(data-label) !important;
                font-weight: bold !important;
                display: inline-block !important;
                width: 120px !important;
                color: #2c3e50 !important;
            }

            /* Кнопки действия вертикально */
            td[style*="text-align: center"] {
                text-align: center !important;
                display: flex !important;
                flex-direction: column !important;
                gap: 8px !important;
                padding-top: 15px !important;
            }

            a[href*="edit"],
            form button[type="submit"] {
                width: 100% !important;
                box-sizing: border-box !important;
            }

            /* Пагинация — центр */
            [style*="margin-top: 20px"] {
                text-align: center !important;
            }

            .custom-pagination {
                justify-content: center !important;
            }
        }

        /* До 480px */
        @media (max-width: 480px) {
            h1 {
                font-size: 18px !important;
            }

            select[name="type"] {
                font-size: 14px !important;
            }

            td:before {
                width: 100px !important;
                font-size: 12px !important;
            }

            .page-number, .current-page {
                padding: 2px 4px !important;
                font-size: 11px !important;
            }
        }
</style>

@section('content')
<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h1 style="color: #2c3e50; margin: 0;">Управление продуктами</h1>


    <div style="display: flex; gap: 12px; align-items: center;">
        <!-- Кнопка настроек email заявок -->
        <a href="{{ route('admin.settings.index') }}"
           style="background: #3498db; color: white; padding: 10px 20px;
                   border-radius: 8px; text-decoration: none; font-weight: 500;">
            Настройки email заявок
        </a>

        <!-- Кнопка выхода -->
        <form action="{{ route('logout') }}" method="post" style="display: inline; margin: 0;">
            @csrf
            <button type="submit"
                    style="background: #e74c3c; color: white; padding: 11px 20px; border: none; border-radius: 6px; cursor: pointer; font-weight: 700; box-shadow: 0 2px 4px rgba(231, 76, 60, 0.2); transition: all 0.3s ease;"
                    onmouseover="this.style.background='#c0392b'; this.style.boxShadow='0 4px 8px rgba(192, 57, 43, 0.3)'"
            onmouseout="this.style.background='#e74c3c'; this.style.boxShadow='0 2px 4px rgba(231, 76, 60, 0.2)'">
                Выйти
            </button>
        </form>

        <!-- Кнопка «Добавить продукт» -->
        <a href="{{ route('admin.products.create') }}"
           style="background: #27ae60; color: white; padding: 10px 20px; text-decoration: none; border-radius: 6px; font-family: Arial, Helvetica, sans-serif; font-weight: 700; display: inline-flex; align-items: center; justify-content: center; min-width: 140px; box-shadow: 0 2px 4px rgba(39, 174, 96, 0.2); transition: all 0.3s ease;"
           onmouseover="this.style.background='#219a52'; this.style.boxShadow='0 4px 8px rgba(33, 154, 82, 0.3)'"
           onmouseout="this.style.background='#27ae60'; this.style.boxShadow='0 2px 4px rgba(39, 174, 96, 0.2)'">
            Добавить продукт
        </a>
    </div>
</div>




    <!-- Фильтр по типу -->
    <form method="GET" style="margin-bottom: 20px;">
        <label for="type" style="font-weight: 500; margin-right: 10px;">Тип:</label>
        <select name="type" id="type" onchange="this.form.submit()"
                style="padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            <option value="">Все типы</option>
            @foreach($productTypes as $type)
                <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>
                    {{ $type }}
                </option>
            @endforeach
        </select>
    </form>

    <!-- Таблица продуктов -->
    <table style="width: 100%; border-collapse: collapse; background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <thead>
            <tr style="background: #ecf0f1;">
                <th style="padding: 12px; text-align: left;">ID</th>
                <th style="padding: 12px; text-align: left;">Тип</th>
                <th style="padding: 12px; text-align: left;">Название</th>
                <th style="padding: 12px; text-align: left;">Краткое описание</th>
                <th style="padding: 12px; text-align: left;">Изображение</th>
                <th style="padding: 12px; text-align: center;">Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">{{ $product->id }}</td>
                    <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">{{ $product->type }}</td>
                    <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">{{ $product->name }}</td>
                    <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">{{ Str::limit($product->short_description, 50) }}</td>
                    <td style="padding: 12px; border-bottom: 1px solid #ecf0f1;">
                        @if($product->image_path)
                            <img src="{{ asset($product->image_path) }}"
                                alt="{{ $product->name }}"
                                style="max-width: 80px; max-height: 60px; object-fit: cover;">
                        @else
                            <span>Нет изображения</span>
                        @endif
                    </td>
                    <td style="padding: 12px; border-bottom: 1px solid #ecf0f1; text-align: center;">
                        <!-- Кнопка редактирования -->
                        <a href="{{ route('admin.products.edit', $product->id) }}"
                        style="background: #3498db;
                                color: white;
                                padding: 8px 16px;
                                margin-right: 8px;
                                text-decoration: none;
                                border-radius: 8px;
                                font-size: 14px;
                                font-weight: 900;
                                box-shadow: 0 4px 0 #2980b9;
                                transition: all 0.1s ease;
                                display: inline-block;
                                position: relative;
                                min-width: 100px;
                                text-align: center;"
                        onmousedown="this.style.boxShadow='0 1px 0 #2980b9'; this.style.transform='translateY(3px)'"
                        onmouseup="this.style.boxShadow='0 4px 0 #2980b9'; this.style.transform='translateY(0)'"
                        onmouseover="this.style.background='#2980b9'"
                        onmouseout="this.style.background='#3498db'">
                            <i class="fas fa-edit" style="margin-right: 6px;"></i>
                            Редактировать
                        </a>
                        
                        <!-- Кнопка редактирования -->
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="post" style="display: inline;" onsubmit="return confirm('Вы уверены, что хотите удалить этот продукт?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    style="background: #e74c3c;
                                            color: white;
                                            padding: 8px 16px;
                                            border: none;
                                            border-radius: 8px;
                                            cursor: pointer;
                                            font-size: 14px;
                                            font-weight: 800;
                                            box-shadow: 0 4px 0 #c0392b;
                                            transition: all 0.1s ease;
                                            position: relative;
                                            min-width: 100px;
                                            text-align: center;"
                                    onmousedown="this.style.boxShadow='0 1px 0 #c0392b'; this.style.transform='translateY(3px)'"
                                    onmouseup="this.style.boxShadow='0 4px 0 #c0392b'; this.style.transform='translateY(0)'"
                                    onmouseover="this.style.background='#c0392b'"
                                    onmouseout="this.style.background='#e74c3c'">
                                <i class="fas fa-trash" style="margin-right: 6px;"></i>
                                Удалить
                            </button>
                        </form>

            </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="padding: 20px; text-align: center; color: #7f8c8d;">
            Продукты не найдены
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <!-- Пагинация -->
    <div style="margin-top: 20px;">
        {{ $products->links('vendor.pagination.default') }}
    </div>
</div>
@endsection
