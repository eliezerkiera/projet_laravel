<div>
    <x-form.label :label="$label" :for="$id"/>

 <select
    :name="$name"
    :id="$id"
    {{$attributes->class(['form-select', 'is-invalid'=>$hasError])}}>
    <option @empty($value) selected @endempty >{{__('Please choose')}}</option>

    @foreach ($options as $key=>$option )
        @if($loop->first && empty($value))
        <option value="{{$key}}" @selected($key==$value)>{{$option}}</option>
        @else
        <option value="{{$key}}" @selected($key==$value)>{{$option}}</option>
        @endif
    @endforeach

  </select>

  @if ($showErrors)
  <x-form.errors :name="$name" :is-wired="$isWired" />
@endif
</div>


