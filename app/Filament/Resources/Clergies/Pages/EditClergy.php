<?php

namespace App\Filament\Resources\Clergies\Pages;

use App\Filament\Resources\Clergies\ClergyResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditClergy extends EditRecord
{
    protected static string $resource = ClergyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
