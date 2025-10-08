<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Login;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Leandrocfe\FilamentApexCharts\FilamentApexChartsPlugin;

use function Filament\Support\original_request;

class AppPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('app')
            ->path('')
            ->login(Login::class)
            ->colors([
                'danger' => Color::Rose,
                'gray' => Color::Zinc,
                'info' => Color::Blue,
                'primary' => Color::Sky,
                'success' => Color::Teal,
                'warning' => Color::Orange,
                'pink' => Color::Pink,
                'blue' => Color::Blue,
                'purple' => Color::Purple
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                // Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->navigation(fn (NavigationBuilder $builder) => $this->navigationFn($builder))
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->viteTheme([
                'resources/css/filament/app/theme.css'
            ])
            ->plugins([
                FilamentApexChartsPlugin::make()
            ]);
    }

    protected function navigationFn(NavigationBuilder $builder): NavigationBuilder
    {
        $builder->items([
            NavigationItem::make('Dashboard')
                    ->icon('heroicon-o-home')
                    ->activeIcon('heroicon-s-home')
                    ->isActiveWhen(fn (): bool => original_request()->routeIs('filament.app.pages.dashboard'))
                    ->url(fn (): string => Dashboard::getUrl()),
            NavigationItem::make('Profil')
                    ->icon('heroicon-o-user-circle')
                    ->activeIcon('heroicon-s-user-circle')
                    ->isActiveWhen(fn (): bool => original_request()->routeIs('filament.app.pages.profil'))
                    ->url(fn (): string => \App\Filament\Pages\Profile\Index::getUrl()),
        ]);

        $builder->groups([
            NavigationGroup::make('M5: Nilai Sepunya')->items([
                NavigationItem::make('Dashboard')
                    ->icon('heroicon-o-chart-bar-square')
                    ->activeIcon('heroicon-s-chart-bar-square')
                    ->isActiveWhen(fn (): bool => original_request()->routeIs('filament.app.pages.m5-nilai-sepunya.dashboard'))
                    ->url(fn (): string => \App\Filament\Pages\M5NilaiSepunya\Index::getUrl()),
                NavigationItem::make('Soalan')
                    ->icon('heroicon-o-numbered-list')
                    ->activeIcon('heroicon-s-numbered-list')
                    ->isActiveWhen(fn (): bool => original_request()->routeIs('filament.app.pages.m5-nilai-sepunya.soalan'))
                    ->url(fn (): string => \App\Filament\Pages\M5NilaiSepunya\Form::getUrl()),
                NavigationItem::make('Markah')
                    ->icon('heroicon-o-star')
                    ->activeIcon('heroicon-s-star')
                    ->isActiveWhen(fn (): bool => original_request()->routeIs('filament.app.pages.m5-nilai-sepunya.markah'))
                    ->url(fn (): string => \App\Filament\Pages\M5NilaiSepunya\Score::getUrl()),
                NavigationItem::make('Penilai')
                    ->icon('heroicon-o-user-group')
                    ->activeIcon('heroicon-s-user-group')
                    ->isActiveWhen(fn (): bool => original_request()->routeIs('filament.app.pages.m5-nilai-sepunya.penilai'))
                    ->url(fn (): string => \App\Filament\Pages\M5NilaiSepunya\Scorer::getUrl()),
                NavigationItem::make('Peraturan')
                    ->icon('heroicon-o-clipboard-document-check')
                    ->activeIcon('heroicon-s-clipboard-document-check')
                    ->isActiveWhen(fn (): bool => original_request()->routeIs('filament.app.pages.m5-nilai-sepunya.peraturan'))
                    ->url(fn (): string => \App\Filament\Pages\M5NilaiSepunya\Rule::getUrl()),
            ])->collapsed()
        ]);
        return $builder;
    }
}
