@props([
    'label' => '',
    'name' => '',
    'type' => '',
    'prefix' => '',
])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <textarea class="form-control @error($name) is-invalid @enderror" rows="3" type="text" name="{{ $name }}"
        parsley-trigger="change" required class="form-control" id=""></textarea>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
