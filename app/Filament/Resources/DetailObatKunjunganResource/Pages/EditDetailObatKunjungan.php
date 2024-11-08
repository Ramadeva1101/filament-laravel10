<?php

namespace App\Filament\Resources\DetailObatKunjunganResource\Pages;

use App\Filament\Resources\DetailObatKunjunganResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDetailObatKunjungan extends EditRecord
{
    protected static string $resource = DetailObatKunjunganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
