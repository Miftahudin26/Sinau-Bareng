<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Supplier;
use App\Models\User;
use Filament\Forms\Form;
use App\Models\BahanBaku;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Navigation\NavigationItem;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BahanBakuResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BahanBakuResource\RelationManagers;

class BahanBakuResource extends Resource
{
    protected static ?string $model = BahanBaku::class;

    protected static ?string $navigationLabel = 'Bahan Baku';

    protected static ?string $navigationGroup = 'Kelola Data';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('nama')
                ->label('Nama Bahan Baku')
                ->required(),

                TextInput::make('stok')
                    ->label('Stok')
                    ->numeric()
                    ->required(),

                Select::make('supplier_id')
                    ->label('Supplier')
                    ->relationship('supplier', 'nama')
                    ->required(), // Tambahkan jika field wajib


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('id')
                ->label('ID')
                ->sortable(),

                TextColumn::make('nama')
                ->label('Nama Bahan Baku')
                ->sortable()
                ->searchable(),

                TextColumn::make('stok')
                ->label('Ketersediaan Stok')
                ->sortable()
                ->searchable(),


                TextColumn::make('supplier.nama') // Nama supplier dari relasi
                ->label('Nama Supplier')
                ->sortable()
                ->searchable(),

            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                // EditAction::make()
                //     ->visible(fn(): bool =>
                //         auth()->user()->hasAnyRole(['admin', 'staff_gudang'])
                //     ),
                // DeleteAction::make()
                //     ->visible(fn(): bool =>
                //         auth()->Auth::user()->hasAnyRole(['admin', 'staff_gudang'])
                //     )
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
            'index' => Pages\ListBahanBakus::route('/'),
            'create' => Pages\CreateBahanBaku::route('/create'),
            'edit' => Pages\EditBahanBaku::route('/{record}/edit'),
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
