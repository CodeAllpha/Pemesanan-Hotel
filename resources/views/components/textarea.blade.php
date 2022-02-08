@props((['label','placeholder','name','type'=>'text','value'=>'']))

<div class="form-group">
    <label for=""> <?= $label?> </label>
    <textarea type="{{ $type }}" 
    name="{{ $name }}" style="height: 6rem" placeholder="{{ $placeholder }}"
    class="form-control {{ $errors->has($name) ? 'is-invalid':'' }}">{{ old($name,$value) }}</textarea>
    @error($name)
        <div class="invalid-feedback"> {{ $message }}</div>
    @enderror
</div>