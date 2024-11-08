<?php

namespace App\Filament\Resources\DetailPemeriksaanKunjunganResource\Pages;

use App\Filament\Resources\DetailPemeriksaanKunjunganResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDetailPemeriksaanKunjungan extends EditRecord
{
    protected static string $resource = DetailPemeriksaanKunjunganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
