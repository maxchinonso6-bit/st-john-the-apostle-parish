<?php

namespace App\Filament\Resources\EnrollmentInquiries\Pages;

use App\Filament\Resources\EnrollmentInquiries\EnrollmentInquiryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEnrollmentInquiry extends EditRecord
{
    protected static string $resource = EnrollmentInquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
