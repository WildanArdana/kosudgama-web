<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash; // Perbaikan: Tambahkan use statement untuk Hash
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    // Perbaikan: Ganti ikon agar lebih sesuai
    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    // Perbaikan: Tambahkan validasi unik yang mengabaikan record saat ini (penting untuk edit)
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                // Perbaikan: Hilangkan DateTimePicker untuk email_verified_at karena biasanya diatur oleh sistem, bukan manual
                // Jika ingin menampilkannya, buat read-only atau gunakan Toggle.
                // Forms\Components\Toggle::make('email_verified_at')->label('Email Verified')->disabled(),
                Forms\Components\TextInput::make('password')
                    ->password()
                    // Perbaikan: Hanya wajib diisi saat membuat user baru
                    ->required(fn (string $operation): bool => $operation === 'create')
                    // Perbaikan: Hanya proses field ini jika diisi (agar tidak null saat edit)
                    ->dehydrated(fn ($state) => filled($state))
                    // Perbaikan: Selalu hash password sebelum disimpan ke database
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Perbaikan: Tambahkan kolom ID agar mudah diidentifikasi
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                // Perbaikan: Gunakan IconColumn untuk status verifikasi agar lebih jelas
                Tables\Columns\IconColumn::make('email_verified_at')
                    ->label('Verified')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Perbaikan: Tambahkan action untuk menghapus data per baris
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}