<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KeanggotaanResource\Pages;
use App\Models\Keanggotaan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;

class KeanggotaanResource extends Resource
{
    protected static ?string $model = Keanggotaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Website Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required()->columnSpanFull(),
                TextInput::make('subtitle')->required()->columnSpanFull(),
                Repeater::make('benefits')
                    ->label('Keuntungan Eksklusif')
                    ->schema([
                        TextInput::make('title')->required()->label('Judul Keuntungan'),
                        TextInput::make('description')->required()->label('Deskripsi Singkat'),
                    ])
                    ->columnSpanFull(),
                Repeater::make('requirements')
                    ->label('Syarat Pendaftaran')
                    ->schema([
                        TextInput::make('requirement')->required()->label('Poin Syarat'),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKeanggotaans::route('/'),
            'create' => Pages\CreateKeanggotaan::route('/create'),
            'edit' => Pages\EditKeanggotaan::route('/{record}/edit'),
        ];
    }    
}