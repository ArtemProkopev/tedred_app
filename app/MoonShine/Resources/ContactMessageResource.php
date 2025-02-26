<?php

namespace App\MoonShine\Resources;

use MoonShine\Resources\Resource; // Импорт базового класса
use MoonShine\Fields\Id;         // Обратите внимание на "Id" с маленькой "d"
use MoonShine\Fields\Text;       // Импорт текстового поля
use MoonShine\Fields\Textarea;   // Импорт поля Textarea
use App\Models\ContactMessage;

class ContactMessageResource extends Resource 
{
    public static string $model = ContactMessage::class;

    public function title(): string 
    {
        return 'Contact Messages';
    }

    public function fields(): array
    {
        return [
            Id::make()->sortable(), // Обратите внимание на "Id" с маленькой "d"
            Text::make('Name', 'name')
                ->sortable()
                ->required(),
            Text::make('Email', 'email')
                ->sortable()
                ->required(),
            Text::make('Subject', 'subject')
                ->sortable()
                ->required(),
            Textarea::make('Message', 'message')
                ->required()
        ];
    }

    public function filters(): array 
    {
        return [];
    }

    public function actions(): array 
    {
        return [];
    }
}