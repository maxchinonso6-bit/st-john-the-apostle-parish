<?php

namespace App\Filament\Resources\MassBookings\Pages;

use App\Filament\Resources\MassBookings\MassBookingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMassBooking extends EditRecord
{
    protected static string $resource = MassBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
