<?php

namespace App\Filament\Resources\EnrollmentInquiries\Pages;

use App\Filament\Resources\EnrollmentInquiries\EnrollmentInquiryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEnrollmentInquiries extends ListRecords
{
    protected static string $resource = EnrollmentInquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
