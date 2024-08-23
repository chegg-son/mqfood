@props([
    'type' => 'text',
    'name' => '',
    'label' => '',
])

<div class="mb-3">
    <label for="" class="form-label">{{ $label }}</label>

    <input name="{{ $name }}" type="{{ $type }}" class="form-control @error($name) is-invalid @enderror"
        id="" value="{{ old($name) }}" />
    @error($name)
        <div class="invalid-feedback">{{ $label }} harap diisi!</div>
    @enderror
</div>
