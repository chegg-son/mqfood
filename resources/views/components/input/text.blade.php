@props([
    'type' => 'text',
    'name' => '',
    'label' => '',
    'id' => '',
])

<div class="mb-3">
    <label for="" class="form-label">{{ $label }}</label>

    <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}"
        class="form-control @error($name) is-invalid @enderror" id="" value="{{ old($name) }}" />
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
