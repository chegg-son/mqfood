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
                                <h3 class="">Tambah User</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('action.add.user') }}" class="needs-validation" id="addUser"
                                    method="post" novalidate>
                                    @csrf
                                    <x-input.text name="name" label="Nama"></x-input.text>
                                    <x-input.text name="username" label="Username"></x-input.text>
                                    <x-input.text name="password" label="Password" type="password"></x-input.text>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Role</label>
                                        <select name="is_admin" id=""
                                            class="form-select @error('is_admin') is-invalid @enderror">
                                            <option value="">Pilih Jenis Role</option>
                                            <option value="1">Admin</option>
                                            <option value="0">User</option>
                                        </select>
                                        @error('is_admin')
                                            <div class="invalid-feedback">
                                                Pilih salah satu dari Role yang ada!
                                            </div>
                                        @enderror
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
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
@endpush
