<div class="table-responsive">
    <table class="table mt-4">
        <?php
        $i = 0;
        ?>
        <thead>
            <tr>
                <th>#</th>
                <th>Barang</th>
                <th>Qty</th>
                <th>Harga per Unit</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart_items as $item)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a class="btn btn-default btn-sm me-1" wire:click="decrement({{ $item->id }})"><span
                                class="mdi mdi-minus"></span></a>
                        {{ $item->quantity }}
                        <a class="btn btn-default btn-sm ms-1" wire:click="increment({{ $item->id }})"><span
                                class="mdi mdi-plus"></span></a>
                    </td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->price * $item->quantity }}</td>
                    <td><a class="btn btn-danger btn-sm"><span class="mdi mdi-delete"></span></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row justify-content-end">
        <div class="col-xl-3 col-6 offset-xl-3">
            <p class="text-end"><b>Sub-total:</b> 2930.00</p>
            <p class="text-end">Discout: 12.9%</p>
            <p class="text-end">VAT: 12.9%</p>
            <hr>
            <h3 class="text-end">USD 2930.00</h3>
        </div>
    </div>
</div>
