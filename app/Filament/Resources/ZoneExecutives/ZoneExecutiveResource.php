<?php

namespace App\Filament\Resources\ZoneExecutives;

use App\Filament\Resources\ZoneExecutives\Pages\CreateZoneExecutive;
use App\Filament\Resources\ZoneExecutives\Pages\EditZoneExecutive;
use App\Filament\Resources\ZoneExecutives\Pages\ListZoneExecutives;
use App\Filament\Resources\ZoneExecutives\Schemas\ZoneExecutiveForm;
use App\Filament\Resources\ZoneExecutives\Tables\ZoneExecutivesTable;
use App\Models\ZoneExecutive;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ZoneExecutiveResource extends Resource
{
    protected static ?string $model = ZoneExecutive::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\Select::make('zone_id')
                ->relationship('zone', 'name')
                ->required()
                ->searchable(),
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\TextInput::make('position')->required(),
            Forms\Components\TextInput::make('phone'),
            Forms\Components\FileUpload::make('photo')->image()->disk('public')->directory('zone-executive-photos'),
            Forms\Components\Select::make('status')
                ->options(['active' => 'Active', 'past' => 'Past'])
                ->default('active')
                ->required(),
            Forms\Components\TextInput::make('start_year')->numeric(),
            Forms\Components\TextInput::make('end_year')->numeric(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return ZoneExecutivesTable::configure($table);
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
            'index' => ListZoneExecutives::route('/'),
            'create' => CreateZoneExecutive::route('/create'),
            'edit' => EditZoneExecutive::route('/{record}/edit'),
        ];
    }
}
