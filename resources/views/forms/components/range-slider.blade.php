<x-dynamic-component
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{
        state: $wire.{{ $applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')') }}
    }">
        <input
            id="{{$getId()}}"
            type="range"
            x-model="state"
            class="focus:outline-none focus:bg-primary-200 dark:focus:bg-primary-900 disabled:opacity-70 disabled:cursor-not-allowed filament-forms-range-component border-gray-300 bg-gray-200 dark:bg-white/10 w-90"
            {!! $isRequired() ? 'required' : null !!}
            {{ $applyStateBindingModifiers('wire:model') }}="{{ $getStatePath() }}"
            min="{{ $getMin()}}"
            max="{{ $getMax()}}"
            step="{{ $getStep()}}"
            dusk="filament.forms.{{ $getStatePath() }}"
            {!! $isDisabled() ? 'disabled' : null !!}
        />

        @if (($steps = $getSteps()) && $getDisplaySteps() === true)
        <ul class="flex justify-between w-full px-[10px]">
            @foreach ($steps as $key => $step)
                @include('filament-range-field::forms.components._range-slider-step', [
                    'state' => $getStepsAssoc() ? $key : $loop->iteration,
                    'step' => $step
                ])
            @endforeach
        </ul>
        @endif
    </div>
</x-dynamic-component>
