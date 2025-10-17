<?php

namespace App\Livewire\M5NilaiSepunya;

use App\Models\NsQuestion;
use App\Models\NsScore;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Repeater\TableColumn;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class FormCreateScore extends Component implements HasActions, HasSchemas
{
    use InteractsWithActions;
    use InteractsWithSchemas;

    public ?array $data = [];
    public ?string $yearSelected = null;

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            // ->components([
            // TextInput::make('ns_scorer_id')
            //     ->required()
            //     ->numeric(),
            // TextInput::make('ns_question_id')
            //     ->required()
            //     ->numeric(),
            // TextInput::make('skor')
            //     ->required()
            //     ->default('0'),
            // TextInput::make('created_by')
            //     ->required()
            //     ->numeric(),
            // TextInput::make('updated_by')
            //     ->required()
            //     ->numeric(),
            // ])
            ->components($this->questionsSchema())
            ->statePath('data')
            ->model(NsScore::class)
            ->inline(false)
            ->inlineLabel();
    }

    public function create(): void
    {
        $data = $this->form->getState();

        $record = NsScore::create($data);

        $this->form->model($record)->saveRelationships();
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
            if ($nsQuestion->nsBankQuestion->reverse) {
                $options = [
                    '5' => 'Tidak Pernah',
                    '4' => 'Jarang-Jarang',
                    '3' => 'Kadang-Kadang',
                    '2' => 'Kerap',
                    '1' => 'Sangat Kerap',
                ];
            } else {
                $options = [
                    '5' => 'Tidak Pernah',
                    '4' => 'Jarang-Jarang',
                    '3' => 'Kadang-Kadang',
                    '2' => 'Kerap',
                    '1' => 'Sangat Kerap',
                ];
            }
            $arraySoalan[] = [
                Grid::make([
                    'default' => 1,
                    'md' => 2
                ])
                    ->components([
                        Text::make($nsQuestion->nsBankQuestion->perkara),
                        Radio::make($nsQuestion->id)
                            ->label(fn() => ($key + 1) . '. ' . $nsQuestion->nsBankQuestion->perkara)
                            ->options($options)->inline(),
                    ])
            ];
        }
        $array[] = Actions::make([
            Action::make('create')
                ->label('Simpan & Muktamad')
                ->requiresConfirmation()
                ->submit('create')
        ]);
        $array[] = Section::make('Borang Nilai Sepunya')->schema($arraySoalan);
        $array[] = Actions::make([
            Action::make('create')
                ->label('Simpan & Muktamad')
                ->requiresConfirmation()
                ->submit('create')
        ]);
        return $array;
    }

    public function render(): View
    {
        return view('livewire.m5-nilai-sepunya.form-create-score');
    }
}
