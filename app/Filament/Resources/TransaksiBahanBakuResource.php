<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\TransaksiBahanBaku;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TransaksiBahanBakuResource\Pages;
use App\Filament\Resources\TransaksiBahanBakuResource\RelationManagers;

class TransaksiBahanBakuResource extends Resource
{
    protected static ?string $model = TransaksiBahanBaku::class;

    protected static ?string $navigationLabel = 'Transaksi Bahan Baku';

    protected static ?string $navigationGroup = 'Transaksi';

    protected static ?string $navigationIcon = 'heroicon-o-wallet';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Select::make('bahan_baku_id')
                ->label('Id Bahan Baku')
                ->relationship('bahanBaku', 'nama')
                ->required(),

                Select::make('jenis')
                    ->options([
                        'Pemasukan' => 'Pemasukan',
                        'Pengeluaran' => 'Pengeluaran',
                    ])
                    ->required(),

                TextInput::make('jumlah')
                    ->numeric()
                    ->required(),

                DatePicker::make('tanggal')
                    ->default(now())
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //

                TextColumn::make('bahan_baku_id'),
                TextColumn::make('bahanBaku.nama')
                ->label('Nama Bahan Baku')
                ->sortable()
                ->searchable(),

                TextColumn::make('jenis')
                ->sortable(),
                TextColumn::make('jumlah')
                ->sortable(),
                TextColumn::make('tanggal')
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
            'index' => Pages\ListTransaksiBahanBakus::route('/'),
            'create' => Pages\CreateTransaksiBahanBaku::route('/create'),
            'edit' => Pages\EditTransaksiBahanBaku::route('/{record}/edit'),
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
