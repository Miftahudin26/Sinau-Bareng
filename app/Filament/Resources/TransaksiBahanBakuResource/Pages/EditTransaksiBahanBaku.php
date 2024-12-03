<?php

namespace App\Filament\Resources\TransaksiBahanBakuResource\Pages;

use App\Filament\Resources\TransaksiBahanBakuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransaksiBahanBaku extends EditRecord
{
    protected static string $resource = TransaksiBahanBakuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
