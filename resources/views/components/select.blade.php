@props(['name','value'=>'','selectOption'=>[] ])

<?php
$value = old($name,$value);
?>
<select name="{{$name}}"
class="form-control form-control-sm {{ $errors->has($name) ? 'is-invalid':'' }}">
<option value="">Select</option>
    @foreach ($selectOption as $data)
    @if ($data['value'] == $value)
        <option value="{{ $data['value'] }}" selected>{{ $data['option'] }}</option>
    @else
        <option value="{{ $data['value'] }}">{{ $data['option'] }}</option>
    @endif
    @endforeach
</select>