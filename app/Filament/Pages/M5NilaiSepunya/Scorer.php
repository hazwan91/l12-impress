<?php

namespace App\Filament\Pages\M5NilaiSepunya;

use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;

class Scorer extends Page
{
    // protected string $view = 'filament.pages.m5-nilai-sepunya.scorer';

    protected static ?string $slug = 'm5-nilai-sepunya/penilai';

    public function getHeading(): string|Htmlable
    {
        return 'Penilai Nilai Sepunya';
    }
}
