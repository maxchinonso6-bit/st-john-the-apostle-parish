<?php

namespace App\Filament\Resources\ParishCouncilExecutives;

use App\Filament\Resources\ParishCouncilExecutives\Pages\CreateParishCouncilExecutive;
use App\Filament\Resources\ParishCouncilExecutives\Pages\EditParishCouncilExecutive;
use App\Filament\Resources\ParishCouncilExecutives\Pages\ListParishCouncilExecutives;
use App\Filament\Resources\ParishCouncilExecutives\Schemas\ParishCouncilExecutiveForm;
use App\Filament\Resources\ParishCouncilExecutives\Tables\ParishCouncilExecutivesTable;
use App\Models\ParishCouncilExecutive;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ParishCouncilExecutiveResource extends Resource
{
    protected static ?string $model = ParishCouncilExecutive::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\TextInput::make('position')->required(),
            Forms\Components\FileUpload::make('photo')->image()->disk('public')->directory('council-photos'),
            Forms\Components\Textarea::make('bio')->rows(3),
            Forms\Components\TextInput::make('phone'),
            Forms\Components\Select::make('status')
                ->options(['active' => 'Active', 'past' => 'Past'])
                ->default('active')
                ->required(),
            Forms\Components\TextInput::make('start_year')->numeric(),
            Forms\Components\TextInput::make('end_year')->numeric(),
            Forms\Components\TextInput::make('order')->numeric()->default(0)
                ->helperText('Lower numbers appear first (e.g. Chairman = 0)'),
        ]);
    }
    public static function table(Table $table): Table
    {
        return ParishCouncilExecutivesTable::configure($table);
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
            'index' => ListParishCouncilExecutives::route('/'),
            'create' => CreateParishCouncilExecutive::route('/create'),
            'edit' => EditParishCouncilExecutive::route('/{record}/edit'),
        ];
    }
}
