<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LayananResource\Pages;
use App\Models\Layanan;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;

class LayananResource extends Resource
{
    protected static ?string $model = Layanan::class;
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $pluralModelLabel = 'Layanan Unggulan';
    protected static ?string $navigationGroup = 'Konten Website';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Dasar')
                ->schema([
                    TextInput::make('title')->label('Judul Layanan')->required()->maxLength(255)->columnSpanFull(),

                    FileUpload::make('icon')
                        ->label('Upload Ikon (SVG atau PNG)')
                        ->directory('layanans')
                        ->visibility('public')
                        ->disk('public')
                        ->acceptedFileTypes(['image/svg+xml', 'image/png'])
                        // ✅ PERBAIKAN: Menambahkan batasan ukuran file 15 MB (15360 KB)
                        ->maxSize(15360) 
                        ->required()
                        ->helperText('Upload file .svg atau .png. Ukuran maksimal 15MB.'),

                    Select::make('color')->label('Warna Tema')
                        ->options(['blue' => 'Biru', 'yellow' => 'Kuning', 'purple' => 'Ungu', 'green' => 'Hijau'])
                        ->required(),
                    Textarea::make('snippet')->label('Deskripsi Singkat')->required()->columnSpanFull(),
                ])->columns(2),

            Forms\Components\Section::make('Konten Lengkap')
                ->schema([RichEditor::make('full_description')->label('Deskripsi Lengkap')->required()->columnSpanFull()]),

            Forms\Components\Section::make('Pengaturan Tambahan')
                ->schema([TextInput::make('order')->label('Urutan Tampilan')->numeric()->default(0)])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order')->label('Urutan')->sortable(),
                Tables\Columns\ImageColumn::make('icon')->label('Ikon')->disk('public'),
                Tables\Columns\TextColumn::make('title')->label('Judul')->searchable(),
                Tables\Columns\TextColumn::make('snippet')->label('Deskripsi Singkat')->limit(50),
            ])
            ->reorderable('order')
            ->defaultSort('order', 'asc')
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLayanans::route('/'),
            'create' => Pages\CreateLayanan::route('/create'),
            'edit' => Pages\EditLayanan::route('/{record}/edit'),
        ];
    }
}