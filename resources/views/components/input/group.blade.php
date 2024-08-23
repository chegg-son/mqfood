@props([
    'label' => '',
    'name' => '',
    'type' => '',
    'prefix' => '',
])

<div class="mb-3">
    <label for="" class="form-label">{{ $label }}</label>
    <div class="input-group">
        <span class="input-group-text" id="inputGroupPrepend">{{ $prefix }}</span>
        <input name="{{ $name }}" inputmode="numeric" type="{{ $type }}"
            class="form-control  @error($name) is-invalid @enderror" id="" aria-describedby="inputGroupPrepend"
            value="{{ old($name) }}" />
        <div class="invalid-feedback">
            {{ $label }} harap diisi!
        </div>
    </div>
</div>
