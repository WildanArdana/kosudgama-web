<?php
namespace App\Filament\Resources;
use App\Filament\Resources\PengurusResource\Pages;
use App\Models\Pengurus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;

class PengurusResource extends Resource
{
    protected static ?string $model = Pengurus::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $pluralModelLabel = 'Pengurus';
    protected static ?string $navigationGroup = 'Konten Website';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->required()->maxLength(255),
                TextInput::make('jabatan')->required()->maxLength(255),
                FileUpload::make('foto')->directory('pengurus-fotos')->image()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')->circular(),
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('jabatan')->searchable(),
            ])
            ->reorderable('id')
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
        return [
            'index' => Pages\ListPenguruses::route('/'),
            'create' => Pages\CreatePengurus::route('/create'),
            'edit' => Pages\EditPengurus::route('/{record}/edit'),
        ];
    }    
}