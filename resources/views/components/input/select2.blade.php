@props([
    'label' => '',
    'name' => '',
    'id' => '',
    'options' => [],
])

@push('styles')
    {{-- select2 css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endpush

<div class="mb-3">
    <label for="" class="form-label">{{ $label }}</label>
    <select id="{{ $id }}" name="{{ $name }}" class="form-select @error($name) is-invalid @enderror"
        data-placeholder="Pilih {{ $label }}">
        <option></option>
        @foreach ($options as $supplier)
            <option value="{{ $supplier->id }}" {{ old($name) == $supplier->id }}>{{ $supplier->name }}</option>
        @endforeach
    </select>
    <div class="invalid-feedback">
        Pilih salah satu dari {{ $label }} yang ada!
    </div>
</div>

@push('scripts')
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $('#{{ $id }}').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: true,
        });
    </script>
@endpush
