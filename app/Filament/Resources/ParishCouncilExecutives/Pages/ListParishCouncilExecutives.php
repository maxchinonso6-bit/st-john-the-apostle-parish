<?php

namespace App\Filament\Resources\ParishCouncilExecutives\Pages;

use App\Filament\Resources\ParishCouncilExecutives\ParishCouncilExecutiveResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListParishCouncilExecutives extends ListRecords
{
    protected static string $resource = ParishCouncilExecutiveResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
