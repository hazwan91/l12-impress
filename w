<?php

namespace App\Livewire\M5NilaiSepunya;

use App\Models\NilaiSepunya;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Livewire\Attributes\Computed;
use Livewire\Component;

class TabYears extends Component implements HasSchemas, HasActions
{
    use InteractsWithSchemas;
    use InteractsWithActions;

    public function mainSchema(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('years')
                    ->tabs($this->nsYearsTab())
            ]);
    }

    #[Computed]
    public function nsYears()
    {
        return NilaiSepunya::query()->pluck('year');
    }

    public function nsYearsTab()
    {
        $array = [];
        foreach ($this->nsYears as $nsYear) {
            // $array[] = Tab::make($nsYear)->action(Action::make('nsyear')->requiresConfirmation()->url(fn () => dd()));
        }
        return $array;
    }

    public function render()
    {
        return view('livewire.m5-nilai-sepunya.tab-years');
    }
}
