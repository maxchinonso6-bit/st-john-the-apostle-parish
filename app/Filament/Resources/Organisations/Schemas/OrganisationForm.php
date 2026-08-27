<?php

namespace App\Filament\Resources\Organisations\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class OrganisationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('type')
                    ->required(),
                Textarea::make('mission')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('meeting_day')
                    ->default(null),
                TextInput::make('meeting_time')
                    ->default(null),
                TextInput::make('meeting_venue')
                    ->default(null),
                TextInput::make('logo')
                    ->default(null),
            ]);
    }
}
