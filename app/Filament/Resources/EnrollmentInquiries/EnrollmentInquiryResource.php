<?php

namespace App\Filament\Resources\EnrollmentInquiries;

use App\Filament\Resources\EnrollmentInquiries\Pages\CreateEnrollmentInquiry;
use App\Filament\Resources\EnrollmentInquiries\Pages\EditEnrollmentInquiry;
use App\Filament\Resources\EnrollmentInquiries\Pages\ListEnrollmentInquiries;
use App\Filament\Resources\EnrollmentInquiries\Schemas\EnrollmentInquiryForm;
use App\Filament\Resources\EnrollmentInquiries\Tables\EnrollmentInquiriesTable;
use App\Models\EnrollmentInquiry;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EnrollmentInquiryResource extends Resource
{
    protected static ?string $model = EnrollmentInquiry::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'guardian_name';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\TextInput::make('guardian_name')->required(),
            Forms\Components\TextInput::make('phone')->required(),
            Forms\Components\TextInput::make('email')->email(),
            Forms\Components\TextInput::make('child_class'),
            Forms\Components\Textarea::make('message')->rows(3),
            Forms\Components\Select::make('status')
                ->options(['new' => 'New', 'contacted' => 'Contacted', 'resolved' => 'Resolved'])
                ->default('new')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return EnrollmentInquiriesTable::configure($table);
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
            'index' => ListEnrollmentInquiries::route('/'),
            'create' => CreateEnrollmentInquiry::route('/create'),
            'edit' => EditEnrollmentInquiry::route('/{record}/edit'),
        ];
    }
}
