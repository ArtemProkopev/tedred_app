<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    // Метод для обработки данных формы
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Сохраняем сообщение в базе данных
        ContactMessage::create($validated);

        // Возвращаем успешный ответ
        return response()->json(['message' => 'Your message has been sent!'], 200);
    }

    // Метод для получения всех сообщений
    public function index()
    {
        $messages = ContactMessage::all();
        return response()->json($messages);
    }
}

