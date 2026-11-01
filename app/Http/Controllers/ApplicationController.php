<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'lastName' => 'required|string|max:255',
            'firstName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            // Правила массивом: в регулярке есть символ |, в строке он ломает разбор правил
            'phone' => ['required', 'string', 'regex:/^(\+7|8)[\s\-]?\(?[0-9]{3}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/'],
            'product_id' => 'required|exists:products,id'
        ]);

        $toEmail = Setting::get('application_email', 'manager@bank.com');

                $subject = 'Новая заявка на продукт';
                $message = "Поступила заявка:\n\n";
                $message .= "Фамилия: " . $validated['lastName'] . "\n";
                $message .= "Имя: " . $validated['firstName'] . "\n";
                $message .= "Отчество: " . ($validated['middleName'] ?? 'не указано') . "\n";
                $message .= "Телефон: " . $validated['phone'] . "\n";
                $message .= "Продукт ID: " . $validated['product_id'] . "\n";

        // Сохраняем заявку в базе
        Application::create([
            'last_name' => $validated['lastName'],
            'first_name' => $validated['firstName'],
            'middle_name' => $validated['middleName'] ?? null,
            'phone' => $validated['phone'],
            'product_id' => $validated['product_id'],
        ]);

        // Отправляем уведомление на email из настроек.
        // При MAIL_MAILER=log письмо попадает в storage/logs/laravel.log.
        try {
            Mail::raw($message, function ($mail) use ($toEmail, $subject) {
                $mail->to($toEmail)->subject($subject);
            });
        } catch (\Throwable $e) {
            Log::error('Не удалось отправить заявку на email', [
                'to' => $toEmail,
                'error' => $e->getMessage(),
            ]);
        }

        return response()->json(['success' => true]);
    }
}
