@props(['label','name','value'=>'','selectOption'=>[] ])

<?php
$value = old($name,$value);
?>
<div class="form-group">
    <label for=""><?= $label?> </label>
    <select name="{{$name}}"
class="form-control form-control-sm {{ $errors->has($name) ? 'is-invalid':'' }}">
<option value="">Pilih Kamar</option>
    @foreach ($selectOption as $data)
    @if ($data['value'] == $value)
        <option value="{{ $data['value'] }}" selected>{{ $data['option'] }}</option>
    @else
        <option value="{{ $data['value'] }}">{{ $data['option'] }}</option>
    @endif
    @endforeach
</select>
</div>