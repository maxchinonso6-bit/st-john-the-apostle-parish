<?php

namespace App\Filament\Resources\MassBookings\Pages;

use App\Filament\Resources\MassBookings\MassBookingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMassBookings extends ListRecords
{
    protected static string $resource = MassBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
