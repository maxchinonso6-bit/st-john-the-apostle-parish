<?php

namespace App\Filament\Resources\ParishCouncilExecutives\Pages;

use App\Filament\Resources\ParishCouncilExecutives\ParishCouncilExecutiveResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditParishCouncilExecutive extends EditRecord
{
    protected static string $resource = ParishCouncilExecutiveResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
