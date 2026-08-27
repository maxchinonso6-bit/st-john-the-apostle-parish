<?php

namespace App\Filament\Resources\Clergies\Pages;

use App\Filament\Resources\Clergies\ClergyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListClergies extends ListRecords
{
    protected static string $resource = ClergyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
