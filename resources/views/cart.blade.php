@extends('template')

<style>
    table,
    tr,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse
    }

    th,
    td {
        padding: 10px;
    }
</style>

@section('content')
    <div class="p-3 m-auto w-fit">
        <table class="w-fit">
            <tr class="text-white bg-slate-600">
                <th>No</th>
                <th>Item Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Sub Total</th>
                <th>Delete</th>
            </tr>
            @php
                $total_price = 0;
            @endphp
            @for ($i = 0; $i < count($carts); $i++)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $carts[$i]->getProduct->title }}</td>
                    <td>{{ $carts[$i]->getProduct->price }}</td>
                    <td>{{ $carts[$i]->qty }}</td>
                    <td>{{ $carts[$i]->getProduct->price * $carts[$i]->qty }}</td>
                    @php
                        $total_price += $carts[$i]->getProduct->price * $carts[$i]->qty;
                    @endphp
                    <td><a href="/deleteCart/{{ $carts[$i]->product_id }}"><button
                                class="p-2 font-semibold text-white bg-red-500 rounded-lg text-end hover:bg-white hover:text-red-500">Delete</button></a>
                    </td>
                </tr>
            @endfor
        </table>
        <div class="flex items-center justify-between">
            <a href="/checkout"><button
                    class="p-2 my-2 font-semibold text-white bg-green-500 rounded-lg text-end hover:bg-white hover:text-green-500">Check
                    Out</button></a>
            <p class="my-2">Grand Total {{ $total_price }}</p>
        </div>
    </div>
@endsection
