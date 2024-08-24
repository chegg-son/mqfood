@props([
    'label' => '',
    'name' => '',
    'options' => [],
])

<div class="mb-3">
    <label for="validationCustom05" class="form-label">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-select @error($name) is-invalid @enderror">
        <option value="">Pilih {{ $label }}</option>
        @foreach ($options as $kategori)
            <option value="{{ $kategori->id }}" {{ old($name) == $kategori->id }}>
                {{ $kategori->jenis }}
            </option>
        @endforeach
    </select>
    <div class="invalid-feedback">
        Pilih salah satu dari {{ $label }}
    </div>
</div>
