<div>
    {{-- <form wire:submit="create">
        {{ $this->form }}
    </form> --}}
    <x-filament::section>
        <x-slot name="heading">
            Borang Nilai Sepunya
        </x-slot>

        <table class="table">
            <thead>
                <tr>
                    <th class="w-1/5">Perkara</th>
                    <th class="text-center w-1/2">Sangat Kerap</th>
                    <th class="text-center">Kerap</th>
                    <th class="text-center">Kadang-kadang</th>
                    <th class="text-center">Jarang</th>
                    <th class="text-center">Sangat Jarang</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($this->form as $field)
                    <tr>
                        @foreach ($field as $item)
                            <td>{{ $item }}</td>
                        @endforeach
                    </tr>
                @endforeach --}}
            </tbody>
        </table>
    </x-filament::section>
    <x-filament-actions::modals />
</div>
