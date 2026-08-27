<?php

namespace App\Filament\Resources\ActivitiesSchedules;

use App\Filament\Resources\ActivitiesSchedules\Pages\CreateActivitiesSchedule;
use App\Filament\Resources\ActivitiesSchedules\Pages\EditActivitiesSchedule;
use App\Filament\Resources\ActivitiesSchedules\Pages\ListActivitiesSchedules;
use App\Filament\Resources\ActivitiesSchedules\Schemas\ActivitiesScheduleForm;
use App\Filament\Resources\ActivitiesSchedules\Tables\ActivitiesSchedulesTable;
use App\Models\ActivitiesSchedule;
use BackedEnum;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ActivitiesScheduleResource extends Resource
{
    protected static ?string $model = ActivitiesSchedule::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'category';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\Select::make('category')
                ->options([
                    'Sunday Mass' => 'Sunday Mass',
                    'Morning Mass' => 'Morning Mass',
                    'Confession' => 'Confession',
                    'Catechism' => 'Catechism',
                    'Sick Calls' => 'Sick Calls',
                    'Office Hours' => 'Office Hours',
                ])
                ->required(),
            Forms\Components\TextInput::make('day')->required()->placeholder('e.g. Tuesday to Saturday'),
            Forms\Components\TextInput::make('location')->placeholder('e.g. Parish Centre, Emmanuel Station, Both'),
            Forms\Components\TextInput::make('time')->required()->placeholder('e.g. 6:00 AM'),
            Forms\Components\Textarea::make('notes')->rows(2)->placeholder('e.g. after Morning Masses'),
            Forms\Components\TextInput::make('order')->numeric()->default(0)
                ->helperText('Controls display order within its category.'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return ActivitiesSchedulesTable::configure($table);
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
            'index' => ListActivitiesSchedules::route('/'),
            'create' => CreateActivitiesSchedule::route('/create'),
            'edit' => EditActivitiesSchedule::route('/{record}/edit'),
        ];
    }
}
