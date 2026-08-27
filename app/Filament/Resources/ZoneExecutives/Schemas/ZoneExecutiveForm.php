<?php

namespace App\Filament\Resources\ZoneExecutives\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ZoneExecutiveForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('zone_id')
                    ->required()
                    ->numeric(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('position')
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->default(null),
                TextInput::make('status')
                    ->required()
                    ->default('active'),
                TextInput::make('start_year')
                    ->default(null),
                TextInput::make('end_year')
                    ->default(null),
            ]);
    }
}
