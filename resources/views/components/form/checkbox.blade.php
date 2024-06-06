<div>
    <div class="form-check">
        <input {{ $attributes->merge(['class' => 'form-check-input']) }} type="checkbox" :value="$value"
            :id="$id">


        <x-form.label :label="$label" :for="$id" {{ $attributes->merge(['class' => 'form-check-label']) }} />

    </div>
    @if ($showErrors)
        <x-form.errors :name="$name" :is-wired="$isWired" />
    @endif
</div>
