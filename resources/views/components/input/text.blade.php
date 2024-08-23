@props([
    'type' => 'text',
    'name' => '',
    'label' => '',
])

<div class="mb-3">
    <label for="validationCustom01" class="form-label">{{ $label }}</label>
    <input name="{{ $name }}" type="{{ $type }}" class="form-control @error($name) is-invalid @enderror"
        id="" value="{{ old($name) }}" />
    @error($name)
        <div class="invalid-feedback">{{ $message }}!</div>
    @enderror
</div>
