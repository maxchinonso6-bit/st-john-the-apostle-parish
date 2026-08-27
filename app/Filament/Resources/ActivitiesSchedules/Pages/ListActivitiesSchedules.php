<?php

namespace App\Filament\Resources\ActivitiesSchedules\Pages;

use App\Filament\Resources\ActivitiesSchedules\ActivitiesScheduleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListActivitiesSchedules extends ListRecords
{
    protected static string $resource = ActivitiesScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
