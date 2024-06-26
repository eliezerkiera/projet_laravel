<div>
    <div class="form-check">
        <input
            {{$attributes->class(['form-check-input','is-invalid'=>$hasError])}}
            name="{{$name}}"
            type="checkbox"
            id="{{$id}}"
            value="{{$value}}"
            @checked($isChecked) />


        <x-form.label :label="$label" :for="$id" class="form-check-label"/>

    </div>
    @if ($showErrors)
        <x-form.errors :name="$name" :is-wired="$isWired" />
    @endif
</div>
