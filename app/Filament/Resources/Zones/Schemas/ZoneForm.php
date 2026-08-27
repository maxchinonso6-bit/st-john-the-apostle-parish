<?php

namespace App\Filament\Resources\Zones\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ZoneForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('station_id')
                    ->required()
                    ->numeric(),
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('meeting_day')
                    ->default(null),
                TextInput::make('meeting_time')
                    ->default(null),
                TextInput::make('meeting_venue')
                    ->default(null),
            ]);
    }
}
