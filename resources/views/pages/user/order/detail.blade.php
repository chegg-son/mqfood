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
                        <h1 class="text-center my-3">Pesanan #{{ $order->order_id }}</h1>
                    </div>

                    {{-- data order --}}
                    <div class="card">
                        <div class="card-body">
                            <table class="table ">
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
                            <div>
                                <h3><strong>Total : Rp. {{ number_format($order->total, 0, ',', '.') }}</strong></h3>
                            </div>
                            @if ($order->status == 'canceled')
                            @else
                                <div class="row">
                                    <div class="text-end">
                                        <form id="cancelOrder" action="{{ route('cancel.order', $order->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                        </form>
                                        <a class="btn btn-primary" href="{{ route('show.payment', $order->id) }}">Kirim
                                            bukti transfer</a>
                                        <button onclick="cancelOrder()" class="btn btn-danger waves-effect ">Batalkan
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
