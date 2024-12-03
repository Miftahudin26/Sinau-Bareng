<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Produksi;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use App\Filament\Resources\ProduksiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProduksiResource\RelationManagers;

class ProduksiResource extends Resource
{
    protected static ?string $model = Produksi::class;

    protected static ?string $navigationLabel = 'Produksi';

    protected static ?string $navigationGroup = 'Kelola Data';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //

                Select::make('produk_id')
                ->label('Nama Produk')
                ->relationship('produk', 'nama') // Relasi ke model Produk
                ->required(),


                Select::make('bahan_baku_id')
                ->label('Bahan Baku') // Dropdown untuk memilih bahan baku
                ->relationship('bahanBaku', 'nama') // Relasi ke model BahanBaku
                ->required(),

                TextInput::make('jumlah')
                    ->label('Jumlah')
                    ->numeric()
                    ->required(),

                DatePicker::make('tanggal')
                    ->label('Tanggal Produksi')
                    ->required(),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'Berjalan' => 'Berjalan',
                        'Selesai' => 'Selesai',
                    ])
                    ->required(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')
                ->label('ID')
                ->sortable(),

                TextColumn::make('produk.nama') // Relasi ke produk untuk mendapatkan nama
                ->label('Nama Produk')
                ->sortable()
                ->searchable(),

                TextColumn::make('bahanBaku.nama') // Relasi ke bahanBaku untuk mendapatkan nama bahan baku
                ->label('Bahan Baku')
                ->sortable()
                ->searchable(),

                TextColumn::make('jumlah')
                    ->label('Jumlah')
                    ->sortable(),

                TextColumn::make('tanggal')
                    ->label('Tanggal Produksi')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListProduksis::route('/'),
            'create' => Pages\CreateProduksi::route('/create'),
            'edit' => Pages\EditProduksi::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
