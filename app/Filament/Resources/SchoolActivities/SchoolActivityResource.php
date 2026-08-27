<?php

namespace App\Filament\Resources\SchoolActivities;

use App\Filament\Resources\SchoolActivities\Pages\CreateSchoolActivity;
use App\Filament\Resources\SchoolActivities\Pages\EditSchoolActivity;
use App\Filament\Resources\SchoolActivities\Pages\ListSchoolActivities;
use App\Filament\Resources\SchoolActivities\Schemas\SchoolActivityForm;
use App\Filament\Resources\SchoolActivities\Tables\SchoolActivitiesTable;
use App\Models\SchoolActivity;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SchoolActivityResource extends Resource
{
    protected static ?string $model = SchoolActivity::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\TextInput::make('title')->required(),
            Forms\Components\Textarea::make('description')->rows(4),
            Forms\Components\DatePicker::make('date')
                ->helperText('Leave blank if this is a recurring weekly activity — use "Recurrence" instead.'),
            Forms\Components\TextInput::make('recurrence')
                ->placeholder('e.g. Every Thursday')
                ->helperText('For recurring activities like a weekly clinic or class.'),
            Forms\Components\FileUpload::make('photo')->image()->disk('public')->directory('school-activities'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return SchoolActivitiesTable::configure($table);
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
            'index' => ListSchoolActivities::route('/'),
            'create' => CreateSchoolActivity::route('/create'),
            'edit' => EditSchoolActivity::route('/{record}/edit'),
        ];
    }
}
