<?php

namespace App\Filament\Pages\M5NilaiSepunya;

use App\Models\NsBankQuestion;
use App\Models\NsQuestion;
use App\Models\NsScoreLog;
use Filament\Actions\Action;
use Filament\Forms\Components\Radio;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\EmbeddedTable;
use Filament\Schemas\Components\Form as ComponentsForm;
use Filament\Schemas\Components\Livewire;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;

class Form extends Page
{
    // protected string $view = 'filament.pages.m5-nilai-sepunya.form';

    protected static ?string $slug = 'm5-nilai-sepunya/soalan';

    public function getHeading(): string|Htmlable
    {
        return 'Borang Nilai Sepunya';
    }

    public function content(Schema $schema): Schema
    {
        return $schema
            ->components([
                Livewire::make(\App\Livewire\M5NilaiSepunya\TabYears::class),
                Livewire::make(\App\Livewire\M5NilaiSepunya\TableScoreLogs::class),
                Livewire::make(\App\Livewire\M5NilaiSepunya\FormCreateScore::class),
            ]);
    }
}
