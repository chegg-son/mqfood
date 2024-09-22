@extends('app')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="card">
                        <h1 class="text-center my-3">Daftar Pesanan</h1>
                    </div>

                    {{-- data order --}}
                    <div class="card">
                        <div class="card-body">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col-1">No</th>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Tanggal Order</th>
                                        <th scope="col">Total</th>
                                        <th scope="col" class="col-1">Status</th>
                                        <th scope="col" class="col-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $order->order_id }}</td>
                                            <td>{{ $order->tanggal_transaksi }}</td>
                                            <td>Rp. {{ number_format($order->total, 0, ',', '.') }}</td>
                                            <td>
                                                @if ($order->status == 'pending')
                                                    <a
                                                        class="btn btn-sm w-100 btn-outline-secondary rounded waves-effect">{{ $order->status }}</a>
                                                @elseif ($order->status == 'paid')
                                                    <a
                                                        class="btn btn-sm w-100 btn-outline-warning rounded waves-effect">{{ $order->status }}</a>
                                                @elseif ($order->status == 'success')
                                                    <a
                                                        class="btn btn-sm w-100 btn-outline-success rounded waves-effect">{{ $order->status }}</a>
                                                @elseif ($order->status == 'canceled')
                                                    <a
                                                        class="btn btn-sm w-100 btn-outline-danger rounded waves-effect">{{ $order->status }}</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('order.detail', $order->id) }}"
                                                    class="btn btn-sm btn-primary">Detail</a>
                                                <a href="{{ route('show.invoice', $order->id) }}"
                                                    class="btn btn-sm btn-soft-danger">Invoice</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
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
@endpush
