<?php

namespace App\Filament\Resources\KunjunganResource\Widgets;

use Filament\Widgets\Widget;
use App\Models\Kunjungan;

class SelectedPemeriksaanList extends Widget
{
    protected static string $view = 'filament.resources.kunjungan.widgets.selected-pemeriksaan-list';

    protected function getRecord(): Kunjungan
    {
        return $this->livewire->getRecord();
    }
}
