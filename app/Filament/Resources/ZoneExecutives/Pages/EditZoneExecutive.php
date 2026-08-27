<?php

namespace App\Filament\Resources\ZoneExecutives\Pages;

use App\Filament\Resources\ZoneExecutives\ZoneExecutiveResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditZoneExecutive extends EditRecord
{
    protected static string $resource = ZoneExecutiveResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
