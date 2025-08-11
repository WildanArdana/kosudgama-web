<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TentangResource\Pages;
use App\Models\Tentang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TentangResource extends Resource
{
    protected static ?string $model = Tentang::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $navigationGroup = 'Website Content';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('subtitle')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('vision')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('mission')
                    ->required()
                    ->columnSpanFull()
                    ->helperText('Tulis setiap poin misi di baris baru.'), // Helper text
                
                // ✅ PERBAIKAN: Menambahkan form input untuk 'Tujuan'
                Forms\Components\Textarea::make('tujuan')
                    ->required()
                    ->columnSpanFull()
                    ->helperText('Tulis setiap poin tujuan di baris baru.'), // Helper text
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('subtitle'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListTentangs::route('/'),
            'create' => Pages\CreateTentang::route('/create'),
            'edit' => Pages\EditTentang::route('/{record}/edit'),
        ];
    }
}