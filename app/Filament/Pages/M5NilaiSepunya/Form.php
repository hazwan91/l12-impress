<?php

namespace App\Filament\Pages\M5NilaiSepunya;

use App\Models\NilaiSepunya;
use App\Models\NsBankQuestion;
use App\Models\NsQuestion;
use App\Models\NsScoreLog;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Forms\Components\Radio;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\EmbeddedTable;
use Filament\Schemas\Components\Form as ComponentsForm;
use Filament\Schemas\Components\Html;
use Filament\Schemas\Components\Livewire;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Blade;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;

class Form extends Page
{
    // protected string $view = 'filament.pages.m5-nilai-sepunya.form';

    protected static ?string $slug = 'm5-nilai-sepunya/soalan';

    public function getBreadcrumbs(): array
    {
        return [
            \App\Filament\Pages\M5NilaiSepunya\Index::getUrl() => 'Nilai Sepunya',
            \App\Filament\Pages\M5NilaiSepunya\Form::getUrl() => 'Soalan',
        ];
    }

    public function getHeading(): string|Htmlable
    {
        return 'Borang';
    }

    public function getSubheading(): string|Htmlable|null
    {
        return 'Nilai Sepunya';
    }

    #[Url]
    public ?string $yearSelected = null;

    public function mount(): void
    {
        $this->yearSelected = request()->query('tahun', Carbon::now()->year);
    }

    public function content(Schema $schema): Schema
    {
        return $schema
            ->components([
                Html::make(Blade::render(<<<'blade'
                    <div>
                        <x-filament::tabs label="Content tabs">
                            @foreach($nsYears as $year)
                                <x-filament::tabs.item
                                    tag="a"
                                    :active="$yearSelected == $year"
                                    :href="\App\Filament\Pages\M5NilaiSepunya\Form::getUrl(['tahun' => $year])"
                                    class="w-full"
                                >
                                    {{ $year }}
                                </x-filament::tabs.item>
                            @endforeach
                        </x-filament::tabs>
                    </div>
                blade, [
                    'nsYears' => $this->nsYears,
                    'yearSelected' => $this->yearSelected,
                ])),
                // Livewire::make(\App\Livewire\M5NilaiSepunya\TabYears::class),
                Livewire::make(\App\Livewire\M5NilaiSepunya\TableScoreLogs::class, [
                    'yearSelected' => $this->yearSelected,
                ]),
                Livewire::make(\App\Livewire\M5NilaiSepunya\FormCreateScore::class, [
                    'yearSelected' => $this->yearSelected,
                ]),
            ]);
    }

    #[Computed]
    public function nsYears()
    {
        return NilaiSepunya::query()->pluck('year');
    }
}
