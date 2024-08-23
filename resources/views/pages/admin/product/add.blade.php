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
                                    method="post" novalidate>
                                    @csrf
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Kode Barang</label>
                                        <input name="kode_barang" type="text" class="form-control"
                                            id="validationCustom01" required />
                                        {{-- check error from validator in controller --}}
                                        @error('kode_barang')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror


                                    </div>
                                    <div class="mb-3">
                                        <label for="validationCustom02" class="form-label">Nama Barang</label>
                                        <input name="nama_barang" type="text" class="form-control"
                                            id="validationCustom02" required />
                                        <div class="invalid-feedback">
                                            Nama Barang harap diisi!
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="validationCustomUsername" class="form-label">Stok Barang</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend">Qty</span>
                                            <input name="stok" inputmode="numeric" type="number" class="form-control"
                                                id="validationCustomUsername" aria-describedby="inputGroupPrepend"
                                                required />
                                            <div class="invalid-feedback">
                                                Stok Barang harap diisi!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="validationCustom03" class="form-label">Harga Barang</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend">Rp</span>
                                            <input name="harga" inputmode="numeric" type="number" class="form-control"
                                                id="validationCustom03" required />
                                            <div class="invalid-feedback">
                                                Harga Barang harap diisi
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-3">
                                        <label for="validationCustom04" class="form-label">Kelas</label>
                                        <input name="kelas" type="text" class="form-control" id="validationCustom04"
                                            required />
                                        <div class="invalid-feedback">
                                            Pilih minimal 1 kelas!
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="validationCustom05" class="form-label">Kategori Barang</label>
                                        <select name="kategori_id" id="validationCustom05" class="form-select"
                                            required="">
                                            <option value="">Pilih Kategori Barang</option>
                                            {{-- ambil data option dari db --}}
                                            @foreach ($kategoris as $kategori)
                                                <option value="{{ $kategori->id }}">{{ $kategori->jenis }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Pilih kategori Barang!
                                        </div>
                                    </div>
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
    <script></script>
    <!-- Vendor -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>
@endpush
