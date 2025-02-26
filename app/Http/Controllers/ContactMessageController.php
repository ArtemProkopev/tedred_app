<?php
namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Test; // Импортируем модель Test
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    // Метод для обработки данных формы
    public function store(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Сохраняем сообщение в таблицу contact_messages
        ContactMessage::create($validated);

        // Сохраняем те же данные в таблицу tests
        Test::create($validated);

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