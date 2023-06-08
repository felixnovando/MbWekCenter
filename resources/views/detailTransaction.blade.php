@extends('template')

<style>
    table,
    tr,
    th,
    td {
        border: 1px solid black;
    }

    th,
    td {
        padding: 10px;
    }
</style>

@section('content')
    <div class="p-3 m-auto w-fit">
        <div class="w-fit">
            <table>
                <tr class="text-white bg-slate-600">
                    <th>No</th>
                    <th>Item Name</th>
                    <th>Item Detail</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub Total</th>
                </tr>
                @php
                    $total_price = 0;
                @endphp
                @for ($i = 0; $i < count($transaction->getDetail); $i++)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $transaction->getDetail[$i]->getProduct->title }}</td>
                        <td>{{ $transaction->getDetail[$i]->getProduct->description }}</td>
                        <td>{{ $transaction->getDetail[$i]->getProduct->price }}</td>
                        <td>{{ $transaction->getDetail[$i]->qty }}</td>
                        <td>{{ $transaction->getDetail[$i]->qty * $transaction->getDetail[$i]->getProduct->price }}</td>
                        @php
                            $total_price += $transaction->getDetail[$i]->qty * $transaction->getDetail[$i]->getProduct->price;
                        @endphp
                    </tr>
                @endfor
            </table>
            <p class="mt-3 text-end">Grand Total: Rp {{ $total_price }}</p>
        </div>
    </div>
@endsection
