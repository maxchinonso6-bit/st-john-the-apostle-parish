<?php

namespace App\Filament\Resources\Clergies;

use App\Filament\Resources\Clergies\Pages\CreateClergy;
use App\Filament\Resources\Clergies\Pages\EditClergy;
use App\Filament\Resources\Clergies\Pages\ListClergies;
use App\Filament\Resources\Clergies\Schemas\ClergyForm;
use App\Filament\Resources\Clergies\Tables\ClergiesTable;
use App\Models\Clergy;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ClergyResource extends Resource
{
    protected static ?string $model = Clergy::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\Select::make('role')
                ->options([
                    'Parish Priest' => 'Parish Priest',
                    'Assistant Priest' => 'Assistant Priest',
                    'Resident Priest' => 'Resident Priest',
                    'Indigenous Priest' => 'Indigenous Priest',
                    'Religious' => 'Religious',
                ])
                ->required(),
            Forms\Components\Select::make('status')
                ->options(['active' => 'Active', 'past' => 'Past'])
                ->default('active')
                ->required(),
            Forms\Components\TextInput::make('start_year')->numeric()->required(),
            Forms\Components\TextInput::make('end_year')->numeric(),
            Forms\Components\FileUpload::make('photo')->image()->disk('public')->directory('clergy-photos'),
            Forms\Components\Textarea::make('bio')->rows(4),
        ]);
    }
    public static function table(Table $table): Table
    {
        return ClergiesTable::configure($table);
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
            'index' => ListClergies::route('/'),
            'create' => CreateClergy::route('/create'),
            'edit' => EditClergy::route('/{record}/edit'),
        ];
    }
}
