<?php

namespace App\Filament\Resources\GalleryItems;

use App\Filament\Resources\GalleryItems\Pages\CreateGalleryItem;
use App\Filament\Resources\GalleryItems\Pages\EditGalleryItem;
use App\Filament\Resources\GalleryItems\Pages\ListGalleryItems;
use App\Filament\Resources\GalleryItems\Schemas\GalleryItemForm;
use App\Filament\Resources\GalleryItems\Tables\GalleryItemsTable;
use App\Models\GalleryItem;
use BackedEnum;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GalleryItemResource extends Resource
{
    protected static ?string $model = GalleryItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\Select::make('album_id')
                ->relationship('album', 'title')
                ->required()
                ->searchable(),
            Forms\Components\Select::make('type')
                ->options(['photo' => 'Photo', 'video' => 'Video'])
                ->required()
                ->live(),
            Forms\Components\FileUpload::make('image')
                ->image()
                ->disk('public')
                ->directory('gallery/items')
                ->visible(fn ($get) => $get('type') === 'photo')
                ->required(fn ($get) => $get('type') === 'photo'),
            Forms\Components\TextInput::make('video_url')
                ->url()
                ->placeholder('YouTube or Facebook video link')
                ->visible(fn ($get) => $get('type') === 'video')
                ->required(fn ($get) => $get('type') === 'video'),
            Forms\Components\TextInput::make('caption'),
        ]);
    }
    public static function table(Table $table): Table
    {
        return GalleryItemsTable::configure($table);
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
            'index' => ListGalleryItems::route('/'),
            'create' => CreateGalleryItem::route('/create'),
            'edit' => EditGalleryItem::route('/{record}/edit'),
        ];
    }
}
