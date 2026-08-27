<?php

namespace App\Filament\Resources\DonationProjects\Pages;

use App\Filament\Resources\DonationProjects\DonationProjectResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDonationProject extends EditRecord
{
    protected static string $resource = DonationProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
