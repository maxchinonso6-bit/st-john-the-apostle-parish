<?php

namespace App\Filament\Resources\DonationProjects\Pages;

use App\Filament\Resources\DonationProjects\DonationProjectResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDonationProjects extends ListRecords
{
    protected static string $resource = DonationProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
