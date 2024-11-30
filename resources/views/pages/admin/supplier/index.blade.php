@extends('app')
@push('styles')
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />

    <!-- third party css -->
    <link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- App css -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- icons -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    {{-- sweeetalert2 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.0/sweetalert2.min.js"
        integrity="sha512-OlF0YFB8FRtvtNaGojDXbPT7LgcsSB3hj0IZKaVjzFix+BReDmTWhntaXBup8qwwoHrTHvwTxhLeoUqrYY9SEw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="mt-0">Daftar Suppliers</h3>
                                <hr>
                                <div class="mb-2">
                                    <a href="{{ route('add.user') }}">
                                        <button type="button" class="btn btn-success waves-effect waves-light"><i
                                                class="mdi mdi-plus me-1"></i>
                                            Tambah Supplier</button>
                                    </a>
                                </div>
                                <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama User</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        ?>
                                        @foreach ($suppliers as $supplier)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $supplier->name }}</td>
                                                <td>{{ $supplier->username }}</td>
                                                <td>
                                                    @if ($supplier->is_admin == 3)
                                                        Supplier
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('edit.user', $supplier->id) }}"
                                                        class="btn btn-secondary btn-sm"><span
                                                            class="mdi mdi-pencil"></span></a>
                                                    <a href="{{ route('delete.user', $supplier->id) }}"
                                                        class="btn btn-danger btn-sm" data-confirm-delete="true"><span
                                                            class="mdi mdi-delete"></span></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
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

    <!-- third party js -->
    <script src="{{ url('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ url('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ url('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ url('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ url('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ url('assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ url('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ url('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{ url('assets/js/pages/datatables.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ url('assets/js/app.min.js') }}"></script>
@endpush
