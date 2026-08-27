<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Pages\Page;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Actions\Action;

class ManageSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Parish Settings';
    protected string $view = 'filament.pages.manage-settings';

    public ?array $data = [];

    protected array $settingKeys = [
        'bank_name',
        'account_name',
        'account_number',
        'parish_office_email',
        'welcome_message',
        'parish_motto',
        'parish_history',
        'office_hours',
        'parish_address',
        'office_phone',
    ];

    public function mount(): void
    {
        $values = [];
        foreach ($this->settingKeys as $key) {
            $values[$key] = Setting::where('key', $key)->value('value');
        }
        $this->form->fill($values);
    }

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Bank Transfer Details')
                ->description('Shown on the Mass Booking and Donation pages.')
                ->components([
                    Forms\Components\TextInput::make('bank_name')->required(),
                    Forms\Components\TextInput::make('account_name')->required(),
                    Forms\Components\TextInput::make('account_number')->required(),
                    Forms\Components\TextInput::make('parish_office_email')
                        ->email()
                        ->required()
                        ->helperText('Notifications for new Mass bookings and donations are sent here.'),
                ]),

            Section::make('Homepage Content')
                ->components([
                    Forms\Components\TextInput::make('parish_motto')
                        ->placeholder('e.g. St John, One Family...')
                        ->helperText('Shown as a tagline under the hero headline.'),
                    Forms\Components\Textarea::make('welcome_message')
                        ->rows(3)
                        ->helperText('Shown under the headline on the homepage hero.'),
                ]),
            Section::make('About Page')
                ->components([
                    Forms\Components\Textarea::make('parish_history')
                        ->rows(6)
                        ->helperText('The parish history write-up shown on the About page.'),
                ]),

            Section::make('Contact Details')
                ->components([
                    Forms\Components\Textarea::make('parish_address')->rows(2),
                    Forms\Components\TextInput::make('office_phone'),
                    Forms\Components\TextInput::make('office_hours')
                        ->placeholder('e.g. Monday – Friday, 9:00 AM – 4:00 PM'),
                    Forms\Components\TextInput::make('map_query')
                        ->label('Map Location')
                        ->placeholder('e.g. St John the Apostle Parish, Isiakpu Nsukka')
                        ->helperText('Used to show the map and "Get Directions" link. Can be an address or landmark name.'),
                ]),
        ])->statePath('data');
    }

    public function save(): void
    {
        $formData = $this->form->getState();

        foreach ($formData as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        \Filament\Notifications\Notification::make()
            ->title('Settings saved')
            ->success()
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')->label('Save Settings')->submit('save'),
        ];
    }
}