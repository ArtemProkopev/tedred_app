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

    // Мутатор для автоматического форматирования даты
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? \Carbon\Carbon::parse($value) : null;
    }
}