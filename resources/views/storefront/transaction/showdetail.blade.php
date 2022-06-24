<table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
        <?php
            $jumlah = 0;
            $total = 0;
        ?>
        @foreach($medicines as $m)
        <?php
            $quantity = $m->pivot->quantity;
            $jumlah += $quantity;
            $total += $quantity * $m->pivot->price;
        ?>
        <tr>
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-3 hidden-xs"><img height="50px" src="{{ asset('images/'.$m->image) }}" alt="..." class="img-responsive"/></div>
                    <div class="col-sm-9">
                        <a href="{{ url('/medicine/'.$m->id) }}">{{ $m->generic_name }} ({{ $m->form }})</a>
                    </div>
                </div>
            </td>
            <td data-th="Price">Rp{{ $m->pivot->price }}</td>
            <td data-th="Quantity">
                {{ $quantity }}
            </td>
            <td data-th="Subtotal" class="text-center">{{ $quantity * $m->pivot->price }}</td>
            <td class="actions" data-th="">
            </td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="3" style="align:right;">Total:</td>
            <td class="text-center"><strong>Rp{{ number_format($total, 0, ',', '.') }}</strong></td>
        </tr>
        </tfoot>
    </table>
