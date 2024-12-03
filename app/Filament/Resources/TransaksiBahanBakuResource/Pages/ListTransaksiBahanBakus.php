<?php

namespace App\Filament\Resources\TransaksiBahanBakuResource\Pages;

use App\Filament\Resources\TransaksiBahanBakuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransaksiBahanBakus extends ListRecords
{
    protected static string $resource = TransaksiBahanBakuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
