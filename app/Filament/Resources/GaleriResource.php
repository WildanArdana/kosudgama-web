<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GaleriResource\Pages;
use App\Models\Galeri;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

// Tambahkan use statement untuk ImageColumn
use Filament\Tables\Columns\ImageColumn;

class GaleriResource extends Resource
{
    protected static ?string $model = Galeri::class;
    protected static ?string $navigationIcon = 'heroicon-o-camera';
    protected static ?string $pluralModelLabel = 'Galeri';
    protected static ?string $navigationGroup = 'Konten Website';

    public static function form(Form $form): Form
    {
        return $form->schema([
            // Mengatur agar gambar disimpan di direktori 'galeri' pada disk 'public'
            Forms\Components\FileUpload::make('image')
                ->label('Gambar')
                ->image()
                ->required()
                ->directory('galeri')
                ->disk('public'),

            Forms\Components\TextInput::make('caption')
                ->label('Keterangan')
                ->maxLength(255),

            Forms\Components\TextInput::make('order')
                ->label('Urutan')
                ->numeric()
                ->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // PERBAIKAN: Tambahkan ->disk('public') untuk memberitahu Filament lokasi gambar
                ImageColumn::make('image')
                    ->label('Gambar')
                    ->disk('public'),

                Tables\Columns\TextColumn::make('caption')
                    ->label('Keterangan')
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->sortable(),
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
    
    public static function getPages(): array 
    { 
        return ['index' => Pages\ListGaleris::route('/')]; 
    }    
}
