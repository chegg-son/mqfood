@props([
    'name' => '',
    'label' => '',
])

<div class="mb-3">
    <label for="" class="form-label">{{ $label }}</label>
    <input type="file" name="{{ $name }}" id="{{ $name }}"
        class="form-control @error($name) is-invalid @enderror" aria-label="{{ $label }}">
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
