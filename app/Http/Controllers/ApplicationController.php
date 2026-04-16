<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'lastName' => 'required|string|max:255',
            'firstName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'phone' => 'required|string|regex:/^(\+7|8)[\s\-]?\(?[0-9]{3}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/',
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

                // Логирование
                \Log::info('Заявка отправлена на email', [
                    'to' => $toEmail,
                    'subject' => $subject,
                    'message' => $message
                ]);

                return response()->json(['success' => true]);
    }
}
