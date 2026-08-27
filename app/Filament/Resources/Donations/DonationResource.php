<?php

namespace App\Filament\Resources\Donations;

use App\Filament\Resources\Donations\Pages\CreateDonation;
use App\Filament\Resources\Donations\Pages\EditDonation;
use App\Filament\Resources\Donations\Pages\ListDonations;
use App\Filament\Resources\Donations\Schemas\DonationForm;
use App\Filament\Resources\Donations\Tables\DonationsTable;
use App\Models\Donation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DonationResource extends Resource
{
    protected static ?string $model = Donation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'donor_name';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\Select::make('donation_project_id')
                ->relationship('project', 'title')
                ->required()
                ->searchable(),
            Forms\Components\TextInput::make('donor_name')->placeholder('Leave blank for anonymous'),
            Forms\Components\TextInput::make('email'),
            Forms\Components\TextInput::make('amount')->numeric()->prefix('₦')->required(),
            Forms\Components\FileUpload::make('proof_of_payment')
                ->label('Proof of Payment')
                ->directory('proof-of-payment')
                ->image()
                ->disk('public')
                ->disabled(),
            Forms\Components\Select::make('payment_status')
                ->options(['pending' => 'Pending', 'paid' => 'Paid', 'failed' => 'Failed'])
                ->default('pending')
                ->required(),
        ]);
    }
    public static function table(Table $table): Table
    {
        return DonationsTable::configure($table);
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
            'index' => ListDonations::route('/'),
            'create' => CreateDonation::route('/create'),
            'edit' => EditDonation::route('/{record}/edit'),
        ];
    }
}
