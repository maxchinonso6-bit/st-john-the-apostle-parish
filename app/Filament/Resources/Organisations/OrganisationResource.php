<?php

namespace App\Filament\Resources\Organisations;

use App\Filament\Resources\Organisations\Pages\CreateOrganisation;
use App\Filament\Resources\Organisations\Pages\EditOrganisation;
use App\Filament\Resources\Organisations\Pages\ListOrganisations;
use App\Filament\Resources\Organisations\Schemas\OrganisationForm;
use App\Filament\Resources\Organisations\Tables\OrganisationsTable;
use App\Models\Organisation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OrganisationResource extends Resource
{
    protected static ?string $model = Organisation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

public static function form(Schema $schema): Schema
{
    return $schema->components([
        Forms\Components\TextInput::make('name')->required(),
        Forms\Components\Select::make('type')
            ->options(['activity' => 'Activity Organisation', 'pious' => 'Pious Organisation'])
            ->required(),
        Forms\Components\TextInput::make('slogan')->placeholder('e.g. CMO... Christ is Our Leader'),
        Forms\Components\TextInput::make('order')->numeric()->default(0)->helperText('Lower numbers appear first.'),
        Forms\Components\Textarea::make('mission')->rows(3),
        Forms\Components\TextInput::make('meeting_day'),
        Forms\Components\TextInput::make('meeting_time'),
        Forms\Components\TextInput::make('meeting_venue'),
       Forms\Components\FileUpload::make('logo')->image()->disk('public')->directory('organisation-logos'),
    ]);
}

    public static function table(Table $table): Table
    {
        return OrganisationsTable::configure($table);
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
            'index' => ListOrganisations::route('/'),
            'create' => CreateOrganisation::route('/create'),
            'edit' => EditOrganisation::route('/{record}/edit'),
        ];
    }
}
