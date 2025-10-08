<?php

namespace App\Filament\Pages\M5NilaiSepunya;

use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;

class Index extends Page
{
    // protected string $view = 'filament.pages.m5-nilai-sepunya.index';

    protected static ?string $slug = 'm5-nilai-sepunya/dashboard';

    public function getHeading(): string|Htmlable
    {
        return 'Dashboard';
    }
}
