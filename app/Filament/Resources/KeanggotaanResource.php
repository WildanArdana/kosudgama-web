<?php
// app/Filament/Resources/KeanggotaanResource.php

namespace App\Filament\Resources;

use App\Filament\Resources\KeanggotaanResource\Pages;
use App\Models\Keanggotaan; // Ganti dengan model yang sesuai jika ada
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KeanggotaanResource extends Resource
{
    // Ganti dengan model yang sesuai, atau hapus jika tidak menggunakan model
    protected static ?string $model = Keanggotaan::class; 

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Konten Website';
    protected static ?string $pluralModelLabel = 'Info Keanggotaan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Keuntungan Anggota')
                    ->description('Atur daftar keuntungan yang ditampilkan di halaman depan.')
                    ->schema([
                        Forms\Components\Repeater::make('keuntungans')
                            ->label('Daftar Keuntungan')
                            ->schema([
                                Forms\Components\TextInput::make('icon')
                                    ->label('Nama Ikon (Feather Icons)')
                                    ->required(),
                                Forms\Components\TextInput::make('title')
                                    ->label('Judul Keuntungan')
                                    ->required(),
                                Forms\Components\Textarea::make('description')
                                    ->label('Deskripsi Singkat')
                                    ->rows(2)
                                    ->required(),
                            ])
                            ->columns(2)
                            ->defaultItems(3),
                    ]),
                
                Forms\Components\Section::make('Syarat Pendaftaran')
                    ->description('Atur daftar syarat pendaftaran yang ditampilkan.')
                    ->schema([
                        Forms\Components\Repeater::make('syarats')
                            ->label('Daftar Syarat')
                            ->schema([
                                Forms\Components\TextInput::make('syarat_text')
                                    ->label('Teks Syarat')
                                    ->required(),
                            ])
                            ->defaultItems(5),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        // Karena ini bukan data yang berulang, kita bisa sederhanakan tabelnya
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')->label('Dibuat Pada'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        // Sesuaikan jika Anda ingin halaman create, edit, dan list
        return [
            'index' => Pages\ListKeanggotaans::route('/'),
            'create' => Pages\CreateKeanggotaan::route('/create'),
            'edit' => Pages\EditKeanggotaan::route('/{record}/edit'),
        ];
    }
}