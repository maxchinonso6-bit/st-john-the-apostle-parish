<?php

namespace App\Filament\Resources\DonationProjects;

use App\Filament\Resources\DonationProjects\Pages\CreateDonationProject;
use App\Filament\Resources\DonationProjects\Pages\EditDonationProject;
use App\Filament\Resources\DonationProjects\Pages\ListDonationProjects;
use App\Filament\Resources\DonationProjects\Schemas\DonationProjectForm;
use App\Filament\Resources\DonationProjects\Tables\DonationProjectsTable;
use App\Models\DonationProject;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DonationProjectResource extends Resource
{
    protected static ?string $model = DonationProject::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\TextInput::make('title')->required(),
            Forms\Components\TextInput::make('category')
                ->placeholder('e.g. Church Building Project')
                ->helperText('Groups related projects together on the Donations page. Leave blank to show as standalone.'),
            Forms\Components\Textarea::make('description')->rows(4),
            Forms\Components\FileUpload::make('photo')->image()->disk('public')->directory('donation-projects'),
        ]);
    }
    public static function table(Table $table): Table
    {
        return DonationProjectsTable::configure($table);
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
            'index' => ListDonationProjects::route('/'),
            'create' => CreateDonationProject::route('/create'),
            'edit' => EditDonationProject::route('/{record}/edit'),
        ];
    }
}
