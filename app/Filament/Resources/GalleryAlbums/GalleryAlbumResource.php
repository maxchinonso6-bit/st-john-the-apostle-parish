<?php

namespace App\Filament\Resources\GalleryAlbums;

use App\Filament\Resources\GalleryAlbums\Pages\CreateGalleryAlbum;
use App\Filament\Resources\GalleryAlbums\Pages\EditGalleryAlbum;
use App\Filament\Resources\GalleryAlbums\Pages\ListGalleryAlbums;
use App\Filament\Resources\GalleryAlbums\Schemas\GalleryAlbumForm;
use App\Filament\Resources\GalleryAlbums\Tables\GalleryAlbumsTable;
use App\Models\GalleryAlbum;
use BackedEnum;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GalleryAlbumResource extends Resource
{
    protected static ?string $model = GalleryAlbum::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\TextInput::make('title')->required(),
            Forms\Components\Select::make('cover_type')
                ->options(['photo' => 'Photo', 'video' => 'Video'])
                ->required()
                ->live()
                ->default('photo'),
            Forms\Components\FileUpload::make('cover_image')
                ->image()
                ->disk('public')
                ->directory('gallery/covers')
                ->visible(fn ($get) => $get('cover_type') === 'photo')
                ->required(fn ($get) => $get('cover_type') === 'photo'),
            Forms\Components\TextInput::make('cover_video_url')
                ->url()
                ->placeholder('YouTube or Facebook video link')
                ->visible(fn ($get) => $get('cover_type') === 'video')
                ->required(fn ($get) => $get('cover_type') === 'video'),
            Forms\Components\DatePicker::make('event_date'),
            Forms\Components\Textarea::make('description')->rows(3),
        ]);
    }
    public static function table(Table $table): Table
    {
        return GalleryAlbumsTable::configure($table);
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
            'index' => ListGalleryAlbums::route('/'),
            'create' => CreateGalleryAlbum::route('/create'),
            'edit' => EditGalleryAlbum::route('/{record}/edit'),
        ];
    }
}
