<?php
namespace App\Filament\Resources;
use App\Filament\Resources\GaleriResource\Pages;
use App\Models\Galeri;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GaleriResource extends Resource
{
    protected static ?string $model = Galeri::class;
    protected static ?string $navigationIcon = 'heroicon-o-camera';
    protected static ?string $pluralModelLabel = 'Galeri';
    protected static ?string $navigationGroup = 'Konten Website';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('image')->image()->required()->directory('galeri'),
            Forms\Components\TextInput::make('caption')->maxLength(255),
            Forms\Components\TextInput::make('order')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('caption')->searchable(),
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
    
    public static function getPages(): array { return ['index' => Pages\ListGaleris::route('/')]; }    
}