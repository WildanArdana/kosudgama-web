<?php
namespace App\Filament\Resources;
use App\Filament\Resources\TestimoniResource\Pages;
use App\Models\Testimoni;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TestimoniResource extends Resource
{
    protected static ?string $model = Testimoni::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $pluralModelLabel = 'Testimoni';
    protected static ?string $navigationGroup = 'Konten Website';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama_anggota')->required(),
            Forms\Components\TextInput::make('keterangan_anggota')->required(),
            Forms\Components\FileUpload::make('foto')->image()->directory('testimoni')->required(),
            Forms\Components\Textarea::make('kutipan')->required()->columnSpanFull(),
            Forms\Components\TextInput::make('order')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')->circular(),
                Tables\Columns\TextColumn::make('nama_anggota')->searchable(),
                Tables\Columns\TextColumn::make('kutipan')->limit(50),
            ])
            ->reorderable('order')
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }
    
    public static function getPages(): array
    {
        return ['index' => Pages\ListTestimonis::route('/')];
    }    
}
