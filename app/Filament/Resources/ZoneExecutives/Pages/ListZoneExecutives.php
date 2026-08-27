<?php

namespace App\Filament\Resources\ZoneExecutives\Pages;

use App\Filament\Resources\ZoneExecutives\ZoneExecutiveResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListZoneExecutives extends ListRecords
{
    protected static string $resource = ZoneExecutiveResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
