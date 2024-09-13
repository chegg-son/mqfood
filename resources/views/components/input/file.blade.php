@props([
    'name' => '',
    'label' => '',
])

<div class="mb-3">
    <label for="" class="form-label">{{ $label }}</label>
    <input type="file" name="{{ $name }}" id="{{ $name }}"
        class="form-control @error($name) is-invalid @enderror" aria-label="gambar barang">
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
