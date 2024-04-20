@if(!empty($errors->all()))
@php $errorList = $errors->get($name) @endphp
<div {!! $attributes->merge(['class' => 'invalid-feedback d-block']) !!}>
    @if (is_array($errorList))
        <ul>
            @foreach ($errorList as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @else
        {{ $message }}
    @endif
</div>

@endif
