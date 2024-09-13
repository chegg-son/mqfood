@extends('app')
@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="">Tambah Barang</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('action.add.product') }}" class="needs-validation" id="addProduct"
                                    method="post" novalidate enctype="multipart/form-data">
                                    @csrf
                                    <x-input.text name="kode_barang" label="Kode Barang"></x-input.text>
                                    <x-input.text name="nama_barang" label="Nama Barang"></x-input.text>
                                    <x-input.file name="gambar_barang" label="Gambar Barang"></x-input.file>
                                    <x-input.group type="number" name="stok" label="Stok Barang"
                                        prefix="Qty"></x-input.group>
                                    <x-input.group type="number" name="harga" label="Harga Barang"
                                        prefix="Rp"></x-input.group>
                                    <x-input.text name="kelas" label="Kelas"></x-input.text>
                                    <x-input.option name="kategori_id" label="Kategori Barang"
                                        :options="$kategoris"></x-input.option>

                                    <button class="btn btn-primary" type="submit">Submit form</button>
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
    <script src="{{ url('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ url('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ url('assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ url('assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ url('assets/libs/feather-icons/feather.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ url('assets/js/app.min.js') }}"></script>
@endpush
