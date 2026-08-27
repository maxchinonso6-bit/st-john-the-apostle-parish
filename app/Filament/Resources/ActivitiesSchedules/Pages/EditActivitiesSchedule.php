<?php

namespace App\Filament\Resources\ActivitiesSchedules\Pages;

use App\Filament\Resources\ActivitiesSchedules\ActivitiesScheduleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditActivitiesSchedule extends EditRecord
{
    protected static string $resource = ActivitiesScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
