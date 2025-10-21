<div x-data="{ value: @js($currentValue) }" class="flex gap-1">
    @foreach (['1', '2', '3', '4', '5'] as $option)
        <label class="filament-forms-radio-component">
            <input type="radio" name="rating[{{ $questionId }}]" value="{{ $option }}"
                wire:model="ratings.{{ $questionId }}" class="sr-only" x-on:change="value = '{{ $option }}'" />
            <div @class([
                'flex items-center justify-center w-8 h-8 rounded-full border-2 cursor-pointer transition',
                'border-primary-600 bg-primary-500 text-white' => $currentValue == $option,
                'border-gray-300 hover:border-gray-400' => $currentValue != $option,
            ])>
                {{ $option }}
            </div>
        </label>
    @endforeach
</div>
