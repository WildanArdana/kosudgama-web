<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class Settings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $view = 'filament.pages.settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = Setting::pluck('value', 'key')->all();
        $this->form->fill($settings);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('General')
                            ->schema([
                                TextInput::make('site_name')->label('Site Name'),
                                TextInput::make('site_title')->label('Site Title'),
                                Textarea::make('meta_description')->label('Meta Description'),
                            ]),
                        
                        // **TAB BARU DITAMBAHKAN DI SINI**
                        Tabs\Tab::make('Hero Section')
                            ->schema([
                                TextInput::make('hero_title')->label('Hero Title'),
                                Textarea::make('hero_subtitle')->label('Hero Subtitle'),
                                TextInput::make('hero_button_text')->label('Hero Button Text'),
                            ]),
                            
                        Tabs\Tab::make('Contact')
                            ->schema([
                                TextInput::make('contact_email')->label('Contact Email')->email(),
                                TextInput::make('contact_phone')->label('Contact Phone'),
                                TextInput::make('contact_whatsapp')
                                    ->label('Contact Whatsapp')
                                    ->placeholder('6281234567890')
                                    ->helperText('Masukkan nomor tanpa tanda + atau spasi.'),
                                Textarea::make('contact_address')->label('Contact Address'),
                            ]),
                        Tabs\Tab::make('Social Media')
                            ->schema([
                                TextInput::make('social_facebook')->label('Facebook URL')->url(),
                                TextInput::make('social_twitter')->label('Twitter URL')->url(),
                                TextInput::make('social_instagram')->label('Instagram URL')->url(),
                                TextInput::make('social_youtube')->label('YouTube URL')->url(),
                                TextInput::make('social_linkedin')->label('LinkedIn URL')->url(),
                            ]),
                    ]),
            ])
            ->statePath('data');
    }

    public function getFormActions(): array
    {
        return [
            \Filament\Actions\Action::make('save')
                ->label('Save changes')
                ->submit('submit'),
        ];
    }

    public function submit(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        
        Notification::make()
            ->title('Settings saved successfully!')
            ->success()
            ->send();
    }
}
