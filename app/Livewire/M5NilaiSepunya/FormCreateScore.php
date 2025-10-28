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

    public function form(Schema $schema): Schema
    {
        return $schema
            // ->components($this->questionsSchema())
            ->components([
                Section::make('Borang Nilai Sepunya')->schema([
                    Grid::make(8)
                        ->schema([
                            Text::make('desc')->content('Perkara')->columnSpan(3),
                            Text::make('r1')->content('1')->extraAttributes(['class' => 'text-center']),
                            Text::make('r2')->content('2')->extraAttributes(['class' => 'text-center']),
                            Text::make('r3')->content('3')->extraAttributes(['class' => 'text-center']),
                            Text::make('r4')->content('4')->extraAttributes(['class' => 'text-center']),
                            Text::make('r5')->content('5')->extraAttributes(['class' => 'text-center']),
                        ])
                        ->extraAttributes(['class' => 'bg-gray-100 font-bold border-b px-2 py-2']),
                    Grid::make(8)
                        ->schema($this->questions())
                        ->extraAttributes(['class' => 'bg-gray-100 font-bold border-b px-2 py-2']),
                ])->extraAttributes(['class' => '']),
            ])
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

    protected function questions()
    {
        $array = [];
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

            // $array[] = Grid::make(6)->components([
            //     Text::make($nsQuestion->nsBankQuestion->perkara)
            //         ->columnSpan(3),
            // Radio::make($nsQuestion->id)
            //     ->hiddenLabel()
            //     ->label(fn() => ($key + 1) . '. ' . $nsQuestion->nsBankQuestion->perkara)
            //     ->options($options)->inline()
            //     ->columnSpan(1),
            // Radio::make($nsQuestion->id)
            //     ->hiddenLabel()
            //     ->label(fn() => ($key + 1) . '. ' . $nsQuestion->nsBankQuestion->perkara)
            //     ->options($options)->inline()
            //     ->columnSpan(1),
            // ]);

            $array[] = Text::make($nsQuestion->nsBankQuestion->perkara)->columnSpan(3);
            $array[] = Radio::make($nsQuestion->id . '_1')
                ->hiddenLabel()
                ->label(null)
                ->options($options)->extraAttributes(['class' => 'text-center'])->inline()->columnSpan(5);
            // $array[] = Radio::make($nsQuestion->id . '_3')
            //     ->hiddenLabel()
            //     ->label(null)
            //     ->options($options)->extraAttributes(['class' => 'text-center'])->inline();
            // $array[] = Radio::make($nsQuestion->id . '_4')
            //     ->hiddenLabel()
            //     ->label(null)
            //     ->options($options)->extraAttributes(['class' => 'text-center'])->inline();
            // $array[] = Radio::make($nsQuestion->id . '_5')
            //     ->hiddenLabel()
            //     ->label(null)
            //     ->options($options)->extraAttributes(['class' => 'text-center'])->inline();
        }
        return $array;
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
            $arraySoalan[] = Grid::make(6)->components([
                Text::make($nsQuestion->nsBankQuestion->perkara)
                    ->columnSpan(3),
                Radio::make($nsQuestion->id)
                    ->hiddenLabel()
                    ->label(fn() => ($key + 1) . '. ' . $nsQuestion->nsBankQuestion->perkara)
                    ->options($options)->inline()
                    ->columnSpan(1),
                Radio::make($nsQuestion->id)
                    ->hiddenLabel()
                    ->label(fn() => ($key + 1) . '. ' . $nsQuestion->nsBankQuestion->perkara)
                    ->options($options)->inline()
                    ->columnSpan(1),
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
