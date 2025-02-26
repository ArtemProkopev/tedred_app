<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Feedback;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;

/**
 * @extends ModelResource<Feedback>
 */
class FeedbackResource extends ModelResource
{
    protected string $model = Feedback::class;

    protected string $title = 'Feedbacks';

    public function getTitle(): string
    {
        return 'Feedbacks'; // Название в боковом меню
    }

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Name', 'name')->sortable(),
            Text::make('Email', 'email')->sortable(),
            Text::make('Subject', 'subject')->sortable(),
            Textarea::make('Message', 'message'),
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make(),
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
        ];
    }

    /**
     * @param Feedback $item
     *
     * @return array<string, string[]|string>
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
