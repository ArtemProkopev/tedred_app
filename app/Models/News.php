<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'date',
        'description_first',
        'description_second',
        'image_url',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    // Если нужно преобразовать URL для фронтенда
    public function getImageUrlAttribute($value)
    {
        if (!$value) return null;
        
        // Если URL уже полный (из Cloudinary)
        if (strpos($value, 'http') === 0) {
            return $value;
        }
        
        // Для обратной совместимости с локальными файлами
        return asset('storage/'.$value);
    }

    // Мутатор для автоматического форматирования даты
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? \Carbon\Carbon::parse($value) : null;
    }
}