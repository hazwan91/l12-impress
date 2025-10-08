<?php

namespace App\Filament\Pages\M5NilaiSepunya;

use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;

class Score extends Page
{
    // protected string $view = 'filament.pages.m5-nilai-sepunya.score';

    protected static ?string $slug = 'm5-nilai-sepunya/markah';

    public function getHeading(): string|Htmlable
    {
        return 'Markah Nilai Sepunya';
    }
}
