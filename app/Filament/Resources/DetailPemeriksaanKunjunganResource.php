<?php

namespace App\Filament\Resources;
use Filament\Navigation\NavigationItem;
use App\Filament\Resources\DetailPemeriksaanKunjunganResource\Pages;
use App\Filament\Resources\DetailPemeriksaanKunjunganResource\RelationManagers;
use App\Models\DetailPemeriksaanKunjungan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DetailPemeriksaanKunjunganResource extends Resource
{
    protected static ?string $model = DetailPemeriksaanKunjungan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListDetailPemeriksaanKunjungans::route('/'),
            'create' => Pages\CreateDetailPemeriksaanKunjungan::route('/create'),
            'edit' => Pages\EditDetailPemeriksaanKunjungan::route('/{record}/edit'),
        ];
    }
    public static function getNavigationItems(): array
    {
        return in_array(auth()->user()?->role, ['kasir'])
            ? [
                NavigationItem::make('Detail Pemeriksaan')
                    ->url(static::getUrl())
                    ->icon('heroicon-o-rectangle-stack'),
            ]
            : [];
    }
}
