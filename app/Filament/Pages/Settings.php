<?php
namespace App\Filament\Pages;
use Filament\Pages\Page;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use App\Models\Setting;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;
use Filament\Notifications\Notification;
use Filament\Actions\Action;

class Settings extends Page implements HasForms
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static string $view = 'filament.pages.settings';
    protected static ?int $navigationSort = 100;
    protected static ?string $navigationGroup = 'Konten Website';

    public ?array $data = [];
    public function mount(): void { $this->data = Setting::all()->pluck('value', 'key')->toArray(); }
    public function form(Form $form): Form {
        return $form
            ->schema([
                Section::make('Halaman Utama (Hero)')
                    ->schema([
                        TextInput::make('hero_title')->label('Judul Utama Hero')->required(),
                        Textarea::make('hero_subtitle')->label('Subjudul Hero')->required()->rows(3),
                        TextInput::make('hero_button_text')->label('Teks Tombol Hero')->required(),
                    ]),
                Section::make('Tentang Kami')
                    ->schema([
                        TextInput::make('tentang_title')->label('Judul Tentang Kami')->required(),
                        Textarea::make('tentang_description')->label('Deskripsi Tentang Kami')->required()->rows(4),
                        Textarea::make('tentang_visi')->label('Visi')->required()->rows(3),
                        Textarea::make('tentang_misi')->label('Misi')->required()->rows(3),
                    ]),
                Section::make('Hubungi Kami & Sosial Media')
                    ->schema([
                        TextInput::make('kontak_alamat')->label('Alamat Kantor')->required(),
                        TextInput::make('kontak_telepon')->label('Nomor Telepon')->required(),
                        TextInput::make('kontak_email')->label('Alamat Email')->email()->required(),
                        Textarea::make('kontak_jam_operasional')->label('Jam Operasional')->rows(3)->required(),
                        Textarea::make('kontak_maps_embed')->label('Link Embed Google Maps')->rows(4)->helperText('Salin kode "Embed a map" dari Google Maps dan tempel di sini.'),
                        TextInput::make('social_facebook')->label('Link Facebook')->url()->nullable(),
                        TextInput::make('social_twitter')->label('Link Twitter')->url()->nullable(),
                        TextInput::make('social_instagram')->label('Link Instagram')->url()->nullable(),
                        TextInput::make('social_youtube')->label('Link YouTube')->url()->nullable(),
                    ]),
            ])->statePath('data');
    }
    protected function getFormActions(): array
    {
        return [Action::make('save')->label('Simpan Perubahan')->submit('submit'),];
    }
    public function submit(): void {
        $formData = $this->form->getState();
        foreach ($formData as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value ?? '']);
        }
        Notification::make()->title('Pengaturan berhasil disimpan!')->success()->send();
    }
}
