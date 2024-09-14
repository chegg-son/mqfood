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
                                        <th scope="col">No</th>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $order->order_id }}</td>
                                            <td>Rp. {{ number_format($order->total, 0, ',', '.') }}</td>
                                            <td>
                                                @if ($order->status == 'pending')
                                                    <a
                                                        class="btn btn-sm btn-outline-secondary rounded waves-effect">{{ $order->status }}</a>
                                                @elseif ($order->status == 'sukses')
                                                    <a
                                                        class="btn btn-sm btn-outline-primary rounded waves-effect">{{ $order->status }}</a>
                                                @elseif ($order->status == 'cancel')
                                                    <a
                                                        class="btn btn-sm btn-outline-danger rounded waves-effect">{{ $order->status }}</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('order.detail', $order->id) }}"
                                                    class="btn btn-sm btn-primary">Detail</a>
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
