<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\News;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Date;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;

class NewsResource extends ModelResource
{
    protected string $model = News::class;

    protected string $title = 'News';

    public function getTitle(): string
    {
        return 'News';
    }

    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Title', 'title')->sortable(),
            Text::make('Subtitle', 'subtitle')->sortable(),
            Date::make('Date', 'date')
                ->format('d F, Y')
                ->sortable(),
            Image::make('Image', 'image_url')
                ->dir('news_images')
                ->disk('public'),
        ];
    }

    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make(),
                Text::make('Title', 'title')->required(),
                Text::make('Subtitle', 'subtitle'),
                Date::make('Date', 'date')
                    ->format('d F, Y'), // Убран метод native()
                Textarea::make('First Description Part', 'description_first'),
                Textarea::make('Second Description Part', 'description_second'),
                Image::make('Image', 'image_url')
                    ->dir('news_images')
                    ->disk('public'),
            ])
        ];
    }

    protected function detailFields(): iterable
    {
        return [
            ID::make(),
            Text::make('Title', 'title'),
            Text::make('Subtitle', 'subtitle'),
            Date::make('Date', 'date')->format('d F, Y'),
            Textarea::make('First Description Part', 'description_first'),
            Textarea::make('Second Description Part', 'description_second'),
            Image::make('Image', 'image_url')
                ->dir('news_images')
                ->disk('public'),
        ];
    }

    protected function rules(mixed $item): array
    {
        return [
            'title' => 'required|string|max:255',
            'date' => 'nullable|date',
            'image_url' => 'nullable|',
        ];
    }

    protected function search(): array
    {
        return ['title', 'subtitle'];
    }
}