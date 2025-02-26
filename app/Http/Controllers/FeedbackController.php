<?php
namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
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

        // Сохраняем те же данные в таблицу feedbacks
        Feedback::create($validated);

        // Возвращаем успешный ответ
        return response()->json(['message' => 'Your message has been sent!'], 200);
    }

    // Метод для получения всех сообщений
    public function index()
    {
        $messages = Feedback::all();
        return response()->json($messages);
    }
}