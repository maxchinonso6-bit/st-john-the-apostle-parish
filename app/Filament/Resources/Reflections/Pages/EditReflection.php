<?php

namespace App\Filament\Resources\Reflections\Pages;

use App\Filament\Resources\Reflections\ReflectionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditReflection extends EditRecord
{
    protected static string $resource = ReflectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
