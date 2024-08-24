@extends('app')
@section('content')
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="">Edit Barang</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('action.edit.product', $barang->id) }}" class="needs-validation"
                                    id="addProduct" method="POST" novalidate>
                                    @csrf
                                    @method('PUT')
                                    <x-input.text name="kode_barang" label="Kode Barang"></x-input.text>
                                    <x-input.text name="nama_barang" label="Nama barang"></x-input.text>
                                    <x-input.group type="number" name="stok" label="Stok Barang"
                                        prefix="Qty"></x-input.group>
                                    <x-input.group type="number" name="harga" label="Harga Barang"
                                        prefix="Rp"></x-input.group>
                                    <x-input.text name="kelas" label="Kelas"></x-input.text>
                                    <x-input.option name="kategori_id" label="Kategori Barang"
                                        :options="$kategoris"></x-input.option>
                                    <button class="btn btn-primary" type="submit">Update Data</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container-fluid -->

        </div> <!-- content -->
    </div>
@endsection

@push('scripts')
    <!-- Vendor -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#kode_barang').val('{{ $barang->kode_barang }}');
            $('#nama_barang').val('{{ $barang->nama_barang }}');
            $('#stok').val('{{ $barang->stok }}');
            $('#harga').val('{{ $barang->harga }}');
            $('#kelas').val('{{ $barang->kelas }}');
            $('#kategori_id').val('{{ $barang->kategori_id }}').change();
        });
    </script>
@endpush
