<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Тестовые данные для демонстрации.
     * Администратор: логин admin, пароль password
     */
    public function run(): void
    {
        User::create([
            'login' => 'admin',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        Setting::set('application_email', 'manager@bank.test');

        $products = [
            ['Кредиты', 'Потребительский кредит', 'Деньги на любые цели без залога.', 'Сумма до 3 000 000 ₽, срок до 7 лет, решение за 15 минут.'],
            ['Кредиты', 'Ипотека', 'Жильё в новостройке или на вторичном рынке.', 'Первоначальный взнос от 10%, срок до 30 лет.'],
            ['Вклады', 'Накопительный вклад', 'Проценты на остаток каждый месяц.', 'Пополнение и частичное снятие без потери процентов.'],
            ['Вклады', 'Вклад «Максимальный доход»', 'Повышенная ставка на срок от года.', 'Ставка фиксируется на весь срок вклада.'],
            ['Карты', 'Дебетовая карта', 'Бесплатное обслуживание и кешбэк.', 'Кешбэк до 5% в выбранных категориях.'],
            ['Карты', 'Кредитная карта', 'Льготный период до 100 дней.', 'Лимит до 500 000 ₽, обслуживание от 0 ₽.'],
        ];

        foreach ($products as [$type, $name, $short, $full]) {
            Product::create([
                'type' => $type,
                'name' => $name,
                'short_description' => $short,
                'full_description' => $full,
                'is_active' => true,
            ]);
        }
    }
}
