<?php

namespace App\Filament\Resources\Catechists\Pages;

use App\Filament\Resources\Catechists\CatechistResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCatechist extends EditRecord
{
    protected static string $resource = CatechistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
