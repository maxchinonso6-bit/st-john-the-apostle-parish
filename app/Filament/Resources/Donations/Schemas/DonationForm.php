<?php

namespace App\Filament\Resources\Donations\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DonationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('donation_project_id')
                    ->required()
                    ->numeric(),
                TextInput::make('donor_name')
                    ->default(null),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                TextInput::make('payment_status')
                    ->required()
                    ->default('pending'),
                TextInput::make('payment_reference')
                    ->default(null),
            ]);
    }
}
