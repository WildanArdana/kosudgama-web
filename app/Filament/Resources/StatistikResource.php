<?php
namespace App\Filament\Resources;
use App\Filament\Resources\StatistikResource\Pages;
use App\Models\Statistik;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload; // <-- Tambahkan ini
use Filament\Forms\Components\TextInput;

class StatistikResource extends Resource
{
    protected static ?string $model = Statistik::class;
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar-square';
    protected static ?string $pluralModelLabel = 'Statistik';
    protected static ?string $navigationGroup = 'Konten Website';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('angka')->required()->helperText('Contoh: 1.500+ atau 10+'),
            TextInput::make('label')->required()->helperText('Contoh: Anggota Aktif'),
            // **(DIUBAH)** Mengganti TextInput menjadi FileUpload
            FileUpload::make('icon')
                ->label('Upload Ikon')
                ->image()
                ->directory('statistik-icons')
                ->required()
                ->helperText('Upload ikon dalam format SVG atau PNG.'),
            TextInput::make('order')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('icon')->label('Ikon'), // Menampilkan gambar ikon
                Tables\Columns\TextColumn::make('angka'),
                Tables\Columns\TextColumn::make('label'),
                Tables\Columns\TextColumn::make('order')->sortable(),
            ])
            ->reorderable('order')
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStatistiks::route('/'),
            'create' => Pages\CreateStatistik::route('/create'),
            'edit' => Pages\EditStatistik::route('/{record}/edit'),
        ];
    }    
}
