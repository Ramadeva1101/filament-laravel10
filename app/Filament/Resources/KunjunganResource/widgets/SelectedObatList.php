<?php

namespace App\Filament\Resources\KunjunganResource\Widgets;

use Filament\Widgets\Widget;
use App\Models\Kunjungan;

class SelectedObatList extends Widget
{
    protected static string $view = 'filament.resources.kunjungan.widgets.selected-obat-list';

    protected function getRecord(): Kunjungan
    {
        return $this->livewire->getRecord();
    }
}
