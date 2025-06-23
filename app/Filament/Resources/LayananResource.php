<?php
namespace App\Filament\Resources;
use App\Filament\Resources\LayananResource\Pages;
use App\Models\Layanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;

class LayananResource extends Resource
{
    protected static ?string $model = Layanan::class;
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $pluralModelLabel = 'Layanan Unggulan';
    protected static ?string $navigationGroup = 'Konten Website';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')->required()->maxLength(255)->columnSpanFull(),
            TextInput::make('icon')->required()->helperText('Nama ikon dari Feather Icons (e.g., dollar-sign)'),
            Select::make('color')->options(['blue' => 'Biru', 'yellow' => 'Kuning', 'purple' => 'Ungu', 'green' => 'Hijau'])->required(),
            Textarea::make('snippet')->required()->maxLength(255)->helperText('Deskripsi singkat yang tampil di kartu.'),
            RichEditor::make('full_description')->required()->columnSpanFull()->helperText('Deskripsi lengkap yang tampil saat diklik.'),
            TextInput::make('order')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('snippet')->limit(50),
                Tables\Columns\TextColumn::make('order')->sortable(),
            ])
            ->reorderable('order')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    
    public static function getPages(): array { return ['index' => Pages\ListLayanans::route('/')]; }    
}