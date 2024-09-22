@extends('app')
@push('styles')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.0/sweetalert2.min.js"
        integrity="sha512-OlF0YFB8FRtvtNaGojDXbPT7LgcsSB3hj0IZKaVjzFix+BReDmTWhntaXBup8qwwoHrTHvwTxhLeoUqrYY9SEw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="card">
                        <h1 class="text-center my-3">(admin)Pesanan #{{ $order->order_id }}</h1>
                    </div>

                    {{-- data order --}}
                    <div class="row">
                        <div class="col-7">
                            <div class="card">
                                <div class="card-footer">
                                    <h3>Bukti Transfer</h3>
                                </div>
                                <div class="card-body">
                                    @if ($order->bukti_transfer)
                                        <img class="rounded"
                                            src="{{ asset('storage/payments/' . $order->user_id . '/' . $order->id . '/' . $order->bukti_transfer) }}"
                                            alt="Bukti Transfer" style="width: 100%">
                                    @elseif ($order->status == 'canceled')
                                        <h3 class="text-center">Pesanan dibatalkan</h3>
                                    @else
                                        <div class="text-center">
                                            <h3>Belum ada bukti transfer</h3>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="card">
                                <div class="card-footer">
                                    <h3>Detail Pesanan</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="col-1">#</th>
                                                <th>Barang</th>
                                                <th class="col-1">Harga</th>
                                                <th class="col-1">Qty</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order_detail as $detail)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $detail->barang->nama_barang }}</td>
                                                    <td>Rp. {{ number_format($detail->barang->harga, 0, ',', '.') }}</td>
                                                    <td>{{ $detail->quantity }}</td>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="mb-3">
                                        <h3><strong>Total : Rp. {{ number_format($order->total, 0, ',', '.') }}</strong>
                                        </h3>
                                    </div>
                                    @if ($order->status == 'canceled' || $order->status == 'success')
                                    @else
                                        <div class="row">
                                            <div class="col-12 d-flex gap-1 text-end">
                                                <div class="col">
                                                    <form id="acceptOrder"
                                                        action="{{ route('action.order.confirm', $order->id) }}"
                                                        method="POST">
                                                        @csrf
                                                    </form>
                                                    <button onclick="acceptOrder()"
                                                        class="btn btn-success waves-effect ">Konfirmasi
                                                        Pesanan</button>
                                                </div>
                                                <form id="cancelOrder" action="{{ route('cancel.order', $order->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                </form>
                                                <button onclick="cancelOrder()"
                                                    class="btn btn-danger waves-effect ">Batalkan
                                                    Pesanan?</button>

                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script>
        function cancelOrder() {
            Swal.fire({
                title: "Batalkan Pesanan?",
                text: "Apakah anda yakin ingin membatalkan pesanan ini?",
                icon: "warning",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Ya!",
                showCancelButton: true,
                cancelButtonColor: "#d33",
                cancelButtonText: "Tidak"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('cancelOrder').submit();
                }
            });
        }

        function acceptOrder() {
            Swal.fire({
                title: "Konfirmasi Pesanan?",
                text: "Apakah anda yakin ingin mengkonfirmasi pesanan ini?",
                icon: "warning",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Ya!",
                showCancelButton: true,
                cancelButtonColor: "#d33",
                cancelButtonText: "Tidak"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('acceptOrder').submit();
                }
            });
        }
    </script>

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
