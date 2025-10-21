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
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class FormCreateScore extends Component implements HasActions, HasSchemas, HasTable
{
    use InteractsWithActions;
    use InteractsWithSchemas;
    use InteractsWithTable;

    public ?array $data = [];
    public ?string $yearSelected = null;

    public function mount(): void
    {
        $this->form->fill();
    }

    public function table(Table $table)
    {
        return $table
            ->query(
                NsQuestion::query()
                    ->with([
                        'nsBankQuestion'
                    ])
                    ->where('active', true)
            )
            ->columns([
                TextColumn::make('nsBankQuestion.perkara')
                    ->label('Question')
                    ->weight('medium'),
                ViewColumn::make('answer')
                    ->view('filament.tables.columns.m5-answer-radio')
                    ->viewData(fn(Model $record) => [
                        'questionId' => $record->id,
                        'currentValue' => null
                    ])
                    ->inline()
            ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
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
            $arraySoalan[] = Grid::make([
                'default' => 12,
            ])->components([
                        Text::make($nsQuestion->nsBankQuestion->perkara)
                            ->columnSpan([
                                'default' => 12
                            ]),
                        Radio::make($nsQuestion->id)
                            ->hiddenLabel()
                            ->label(fn() => ($key + 1) . '. ' . $nsQuestion->nsBankQuestion->perkara)
                            ->options($options)->inline()
                            ->columnSpan([
                                'default' => 12
                            ]),
                    ]);
        }
        $array[] = Section::make('Borang Nilai Sepunya')->schema($arraySoalan);
        $array[] = Actions::make([
            Action::make('create')
                ->label('Simpan & Muktamad')
                ->requiresConfirmation()
                ->submit('create')
        ]);
        // dd($array);
        return $array;
    }

    public function render(): View
    {
        return view('livewire.m5-nilai-sepunya.form-create-score');
    }
}
