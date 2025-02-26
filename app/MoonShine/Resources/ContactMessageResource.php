<?php

namespace App\MoonShine\Resources;

use MoonShine\Core\Resources\Resource; // Правильный путь к базовому классу Resource
use MoonShine\UI\Fields\Text;          // Правильный путь к классу Text
use MoonShine\UI\Fields\Textarea;      // Правильный путь к классу TextArea
use App\Models\ContactMessage;         // Модель ContactMessage

class ContactMessageResource extends Resource
{
    public static string $model = ContactMessage::class;

    public function title(): string
    {
        return 'Contact Messages'; // Заголовок в меню
    }

    public function fields(): array
    {
        return [
            Text::make('Name', 'name')
                ->sortable()
                ->searchable(),
            Text::make('Email', 'email')
                ->sortable()
                ->searchable(),
            Text::make('Subject', 'subject')
                ->sortable()
                ->searchable(),
            Textarea::make('Message', 'message') // Обратите внимание на "Textarea" (с маленькой буквы)
                ->sortable()
                ->searchable(),
        ];
    }

    public function rules($item): array
    {
        return [];
    }

    public function pages(): array
    {
        return [
            // Страница списка записей
            'index' => [
                'title' => 'All Messages',
                'fields' => $this->fields(),
            ],

            // Страница создания записи
            'create' => [
                'title' => 'Create Message',
                'fields' => $this->fields(),
            ],

            // Страница редактирования записи
            'edit' => [
                'title' => 'Edit Message',
                'fields' => $this->fields(),
            ],

            // Страница просмотра одной записи
            'show' => [
                'title' => 'View Message',
                'fields' => $this->fields(),
            ],
        ];
    }
}