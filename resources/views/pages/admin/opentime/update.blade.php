@extends('app')
@push('styles')
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('assets/images/favicon.ico') }}" />

    <!-- third party css -->
    <link href="{{ url('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- third party css end -->

    <!-- Plugins css -->
    <link href="{{ url('assets/libs/mohithg-switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/libs/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Picker Plugins css -->
    <link href="{{ url('assets/libs/spectrum-colorpicker2/spectrum.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/libs/clockpicker/bootstrap-clockpicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- App css -->
    <link href="{{ url('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- icons -->
    <link href="{{ url('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form action="{{ route('open-time.update', 1) }}" method="POST" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <h3 class="mt-0">Update Waktu Buka</h3>
                                    <hr>
                                    <h4>Hari</h4>
                                    <select name="hari[]" class="form-control select2-multiple" data-toggle="select2"
                                        data-width="100%" multiple="multiple" data-placeholder="Pilih Hari ...">
                                        <optgroup label="Hari">
                                            <option value="Sunday">Ahad</option>
                                            <option value="Monday">Senin</option>
                                            <option value="Tuesday">Selasa</option>
                                            <option value="Wednesday">Rabu</option>
                                            <option value="Thursday">Kamis</option>
                                            <option value="Friday">Jumat</option>
                                            <option value="Saturday">Sabtu</option>
                                        </optgroup>
                                    </select>
                                    <br>
                                    <h4>Jam</h4>
                                    <div class="row"
                                        style="display: grid; grid-template-columns: 1fr auto 1fr; align-items: center; gap: 10px;">
                                        <div class="input-group clockpicker" data-placement="top" data-align="top"
                                            data-autoclose="true">
                                            <input name="waktu_buka" type="text" class="form-control"
                                                placeholder="12:00">
                                            <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                        </div>
                                        <div><strong>Hingga</strong></div>
                                        <div class="input-group clockpicker" data-placement="top" data-align="top"
                                            data-autoclose="true">
                                            <input name="waktu_tutup" type="text" class="form-control"
                                                placeholder="12:00">
                                            <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="mb-2">
                                        <a href="#">
                                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                                Update Waktu</button>
                                        </a>
                                    </div>
                                </div>
                            </form>
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

    {{-- Plugin --}}
    <script src="{{ url('assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>
    <script src="{{ url('assets/libs/multiselect/js/jquery.multi-select.js') }}"></script>
    <script src="{{ url('assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ url('assets/libs/mohithg-switchery/switchery.min.js') }}"></script>
    <script src="{{ url('assets/libs/jquery-mockjax/jquery.mockjax.min.js') }}"></script>
    <script src="{{ url('assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js') }}"></script>
    <script src="{{ url('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ url('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    {{-- end Plugin --}}

    <!-- Datatables init -->
    <script src="{{ url('assets/js/pages/datatables.init.js') }}"></script>

    <!-- Picker Plugins js-->
    <script src="{{ url('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ url('assets/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>
    <script src="{{ url('assets/libs/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
    <script src="{{ url('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Picker Init js-->
    <script src="{{ url('assets/js/pages/form-pickers.init.js') }}"></script>

    <!-- Select2 Init js-->
    <script src="{{ url('assets/js/pages/form-advanced.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ url('assets/js/app.min.js') }}"></script>
@endpush
