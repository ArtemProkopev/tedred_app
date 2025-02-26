<?php

namespace App\MoonShine\Resources;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use App\Models\ContactMessage;
use MoonShine\Support\Attributes\Icon;
use MoonShine\MenuManager\Attributes\Group;
use MoonShine\MenuManager\Attributes\Order;

// #[Icon('heroicons.chat-bubble-left-ellipsis')]  // Пример иконки из Heroicons
// #[Group('Other')]
// #[Order(2)]
class ContactMessageResource extends ModelResource
{
    public string $model = ContactMessage::class;
    public string $column = 'name'; // Или 'email', в зависимости от нужного отображения

    public function title(): string
    {
        return 'Contact Messages';
    }

    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Name', 'name')
                ->sortable()
                ->searchable(),
            Text::make('Email', 'email')
                ->sortable()
                ->searchable(),
            Text::make('Subject', 'subject')
                ->sortable()
                ->searchable(),
            Textarea::make('Message', 'message')
                ->hideOnIndex()
        ];
    }

    protected function formFields(): iterable
    {
        return $this->indexFields();
    }

    protected function detailFields(): iterable
    {
        return $this->indexFields();
    }

    public function rules($item): array 
    {
        return [];
    }
}