<?php

namespace App\Filament\Resources\Catechists;

use App\Filament\Resources\Catechists\Pages\CreateCatechist;
use App\Filament\Resources\Catechists\Pages\EditCatechist;
use App\Filament\Resources\Catechists\Pages\ListCatechists;
use App\Filament\Resources\Catechists\Schemas\CatechistForm;
use App\Filament\Resources\Catechists\Tables\CatechistsTable;
use App\Models\Catechist;
use BackedEnum;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CatechistResource extends Resource
{
    protected static ?string $model = Catechist::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\TextInput::make('phone'),
            Forms\Components\TextInput::make('email')->email(),
            Forms\Components\FileUpload::make('photo')->image()->disk('public')->directory('catechist-photos'),
            Forms\Components\Textarea::make('bio')->rows(3),
            Forms\Components\Select::make('status')
                ->options(['active' => 'Active', 'past' => 'Past'])
                ->default('active')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return CatechistsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCatechists::route('/'),
            'create' => CreateCatechist::route('/create'),
            'edit' => EditCatechist::route('/{record}/edit'),
        ];
    }
}
