@if($type=="password")
<div>
    <x-form.label :label="$label" :for="$id" class="form-label"/>



          <div class="input-group" id="show_hide_password" x-data="{show:false}">
            <input x-bind:type="!show ? 'password' : 'text'"
                name="{{$name}}"
                id="{{$id}}"
                value="{{$value}}"
                {{$attributes->class(['form-control', 'is-invalid'=>$hasError])}}
                />
            <span class="input-group-text">
              <a href="#" x-on:click="show = !show"><i x-bind:class="!show ? 'bi bi-eye' : 'bi bi-eye-slash'" aria-hidden="true"></i></a>
            </span>

        </div>

        @if ($showErrors)
        <x-form.errors :name="$name" :is-wired="$isWired" />
      @endif
</div>



@else
<div>
    <x-form.label :label="$label" :for="$id" class="form-label"/>

    <input type="{{$type}}"
            name="{{$name}}"
            id="{{$id}}"
            value="{{$value}}"
            {{$attributes->class(['form-control', 'is-invalid'=>$hasError])}}
            />

            @if ($showErrors)
            <x-form.errors :name="$name" :is-wired="$isWired" />
          @endif
</div>
@endif
