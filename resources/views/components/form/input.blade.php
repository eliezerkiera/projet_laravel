<div>
    <x-form.label :label="$label" :for="$id"/>

    <input :type="$type"
            :name="$name"
            :id="$id"
            :value="$value"
            {{$attributes->class(['form-control', 'is-invalid'=>$hasError])}}
            />

            @if ($showErrors)
            <x-form.errors :name="$name" :is-wired="$isWired" />
          @endif
</div>
