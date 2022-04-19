@props((['label','placeholder','name','type'=>'text','value'=>'','keterangan'=>'']))

<div class="form-group">
    <label for=""><?= $label?> </label>
    <input type="{{ $type  }}" placeholder="{{ $placeholder }}"
    name="{{ $name }}"
    value="{{ old($name,$value) }}" disabled
    class="form-control {{ $errors->has($name) ? 'is-invalid':'' }}"/>
    @error($name)
        <div class="invalid-feedback"> {{ $message }}</div>
    @enderror
    @if ($keterangan)
        <div class="text-muted">
            <small>{{ $keterangan }}</small>
        </div>
    @endif
</div>