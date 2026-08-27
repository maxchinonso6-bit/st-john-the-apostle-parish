<?php

namespace App\Filament\Resources\Reflections\Pages;

use App\Filament\Resources\Reflections\ReflectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListReflections extends ListRecords
{
    protected static string $resource = ReflectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
