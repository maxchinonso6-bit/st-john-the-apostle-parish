<?php

namespace App\Filament\Resources\Reflections;

use App\Filament\Resources\Reflections\Pages\CreateReflection;
use App\Filament\Resources\Reflections\Pages\EditReflection;
use App\Filament\Resources\Reflections\Pages\ListReflections;
use App\Filament\Resources\Reflections\Schemas\ReflectionForm;
use App\Filament\Resources\Reflections\Tables\ReflectionsTable;
use App\Models\Reflection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ReflectionResource extends Resource
{
    protected static ?string $model = Reflection::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\TextInput::make('title')->required(),
            Forms\Components\Textarea::make('excerpt')->rows(4),
            Forms\Components\FileUpload::make('photo')->image()->disk('public')->directory('reflections'),
            Forms\Components\TextInput::make('facebook_url')->url()->placeholder('https://facebook.com/...'),
            Forms\Components\DateTimePicker::make('published_at')->default(now()),
        ]);
    }

    public static function table(Table $table): Table
    {
        return ReflectionsTable::configure($table);
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
            'index' => ListReflections::route('/'),
            'create' => CreateReflection::route('/create'),
            'edit' => EditReflection::route('/{record}/edit'),
        ];
    }
}
