@props([
    'label' => '',
    'name' => '',
    'options' => [],
])

<div class="mb-3">
    <label for="validationCustom05" class="form-label">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-select @error($name) is-invalid @enderror">
        <option value="">Pilih {{ $label }}</option>
        @foreach ($options as $user)
            <option value="{{ $user->id }}" {{ old($name) == $user->id }}>
                {{ $user->jenis }}
            </option>
        @endforeach
    </select>
    <div class="invalid-feedback">
        Pilih salah satu dari {{ $label }}
    </div>
</div>
