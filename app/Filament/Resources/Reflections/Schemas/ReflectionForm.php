<?php

namespace App\Filament\Resources\Reflections\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ReflectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('excerpt')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('facebook_url')
                    ->url()
                    ->default(null),
                DateTimePicker::make('published_at'),
            ]);
    }
}
