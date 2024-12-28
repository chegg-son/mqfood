@props([
    'name' => '',
    'label' => '',
])

<div class="form-check mb-2 form-check-dark">
    <input type="checkbox" class="form-check-input" value="{{ $name }}" id="{{ $name }}">
    <label for="{{ $name }}" class="form-check-label" for="{{ $name }}">{{ $label }}</label>
</div>
