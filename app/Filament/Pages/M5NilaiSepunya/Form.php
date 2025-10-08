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
                Livewire::make(\App\Livewire\M5NilaiSepunya\TableScoreLogs::class),
                Livewire::make(\App\Livewire\M5NilaiSepunya\FormCreateScore::class),
                // $this->formComponent(),
            ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components($this->questionsSchema())
            ->inline(false)
            ->inlineLabel();
    }

    public function formComponent(): ComponentsForm
    {
        return ComponentsForm::make([EmbeddedSchema::make('form')])
            ->id('form')
            ->livewireSubmitHandler('submitScore')
            ->header([
                    Actions::make([
                        Action::make('submit')
                            ->label('Simpan & Muktamad')
                    ])
                    ->alignment($this->getFormActionsAlignment())
                    ->fullWidth(false)
                    ->key('form-actions')
            ])
            ->footer([
                    Actions::make([
                        Action::make('submit')
                            ->label('Simpan & Muktamad')
                    ])
                    ->alignment($this->getFormActionsAlignment())
                    ->fullWidth(false)
                    ->key('form-actions'),
            ]);
    }

    protected function questionsSchema(): array|Section
    {
        $array = [];
        $arraySoalan = [];
        $nsQuestions = NsQuestion::query()
            ->with([
                'nsBankQuestion'
            ])
            ->where('active', true)->get();
        foreach ($nsQuestions as $key => $nsQuestion) {
            if ($nsQuestion->reverse) {
                $arraySoalan[] = Radio::make($nsQuestion->id)
                    ->label(fn () => ($key + 1) . '. ' . $nsQuestion->nsBankQuestion->perkara)
                    ->options([
                        '5' => 'Tidak Pernah',
                        '4' => 'Jarang-Jarang',
                        '3' => 'Kadang-Kadang',
                        '2' => 'Kerap',
                        '1' => 'Sangat Kerap',
                    ])->inline();
            } else {
                $arraySoalan[] = Radio::make($nsQuestion->id)
                    ->label(fn () => ($key + 1) . '. ' . $nsQuestion->nsBankQuestion->perkara)
                    ->options([
                        '1' => 'Tidak Pernah',
                        '2' => 'Jarang-Jarang',
                        '3' => 'Kadang-Kadang',
                        '4' => 'Kerap',
                        '5' => 'Sangat Kerap',
                    ])->inline();
            }
        }
        $array[] = Section::make('Borang Nilai Sepunya')->schema($arraySoalan);
        return $array;
    }
}
