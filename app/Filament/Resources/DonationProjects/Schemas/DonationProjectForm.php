<?php

namespace App\Filament\Resources\DonationProjects\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DonationProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('photo')
                    ->default(null),
                TextInput::make('target_amount')
                    ->numeric()
                    ->default(null),
                TextInput::make('amount_raised')
                    ->required()
                    ->numeric()
                    ->default(0.0),
            ]);
    }
}
