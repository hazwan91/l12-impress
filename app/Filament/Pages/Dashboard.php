<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as PagesDashboard;
use Filament\Pages\Page;
use Filament\Schemas\Components\RenderHook;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Schema;
use Filament\View\PanelsRenderHook;

class Dashboard extends PagesDashboard
{
    // protected string $view = 'filament.pages.dashboard';

    public function content(Schema $schema): Schema
    {
        return $schema
            ->components([
                Text::make('Temporary Blank Page'),
                // RenderHook::make(PanelsRenderHook::PAGE_START),
                // Text::make('test'),
                // RenderHook::make(PanelsRenderHook::PAGE_END),
            ]);
    }
}
