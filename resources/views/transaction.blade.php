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
    <div class="m-5">
        <table class="m-auto">
            <tr class="text-white bg-slate-600">
                <th>No</th>
                <th>Transaction Time</th>
                <th>Total Price</th>
                <th>Detail Transaction</th>
            </tr>
            @for ($i = 0; $i < count($transactions); $i++)
                @php
                    $total_price = 0;
                @endphp

                @foreach ($transactions[$i]->getDetail as $detail)
                    @php
                        $total_price += $detail->getProduct->price * $detail->qty;
                    @endphp
                @endforeach

                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $transactions[$i]->created_at }}</td>
                    <td>{{ $total_price }}</td>
                    <td><a href="/transactionDetail/{{ $transactions[$i]->id }}"><button
                                class="p-2 font-semibold text-white bg-blue-500 rounded-lg hover:bg-white hover:text-blue-500">Check
                                Detail</button></a></td>
                </tr>
            @endfor
        </table>
    </div>
@endsection
