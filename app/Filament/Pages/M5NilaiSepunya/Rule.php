<?php

namespace App\Filament\Pages\M5NilaiSepunya;

use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;

class Rule extends Page
{
    // protected string $view = 'filament.pages.m5-nilai-sepunya.rule';

    public function getHeading(): string|Htmlable
    {
        return 'Peraturan Nilai Sepunya';
    }
}
