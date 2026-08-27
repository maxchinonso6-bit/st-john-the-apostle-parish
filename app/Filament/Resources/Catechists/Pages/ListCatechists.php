<?php

namespace App\Filament\Resources\Catechists\Pages;

use App\Filament\Resources\Catechists\CatechistResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCatechists extends ListRecords
{
    protected static string $resource = CatechistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
