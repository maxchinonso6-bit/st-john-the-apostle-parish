<?php

namespace App\Filament\Resources\MassBookings;

use App\Filament\Resources\MassBookings\Pages\CreateMassBooking;
use App\Filament\Resources\MassBookings\Pages\EditMassBooking;
use App\Filament\Resources\MassBookings\Pages\ListMassBookings;
use App\Filament\Resources\MassBookings\Schemas\MassBookingForm;
use App\Filament\Resources\MassBookings\Tables\MassBookingsTable;
use App\Models\MassBooking;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MassBookingResource extends Resource
{
    protected static ?string $model = MassBooking::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'booker_name';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\TextInput::make('booker_name')->required(),
            Forms\Components\TextInput::make('phone')->required(),
            Forms\Components\TextInput::make('email'),
            Forms\Components\Select::make('intention_type')
                ->options([
                    'thanksgiving' => 'Thanksgiving',
                    'sick' => 'For the Sick',
                    'rip' => 'Repose of the Soul (RIP)',
                    'birthday' => 'Birthday',
                    'other' => 'Other',
                ])
                ->required(),
            Forms\Components\Textarea::make('intention_text')->rows(3),
            Forms\Components\DatePicker::make('mass_date')->required(),
            Forms\Components\TextInput::make('amount')->numeric()->prefix('₦'),
            Forms\Components\FileUpload::make('proof_of_payment')
                ->label('Proof of Payment')
                ->directory('proof-of-payment')
                ->image()
                ->disabled(), // admin views what the user uploaded; not meant to be edited here
            Forms\Components\Select::make('payment_status')
                ->options(['pending' => 'Pending', 'paid' => 'Paid', 'failed' => 'Failed'])
                ->default('pending')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return MassBookingsTable::configure($table);
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
            'index' => ListMassBookings::route('/'),
            'create' => CreateMassBooking::route('/create'),
            'edit' => EditMassBooking::route('/{record}/edit'),
        ];
    }
}
