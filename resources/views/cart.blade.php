@extends('template')

<style>
    table, tr, th, td{
        border: 1px solid black;
    }
    th, td{
        padding: 10px;
    }
</style>

@section('content')

    <div>
        <div>
            Cart
        </div>
        <div>
            <table>'
                <tr>
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
                @for($i = 0; $i < count($carts); $i++)
                    <tr>
                        <td>{{$i+1}}</td>
                        <td>{{$carts[$i]->getProduct->title}}</td>
                        <td>{{$carts[$i]->getProduct->price}}</td>
                        <td>{{$carts[$i]->qty}}</td>
                        <td>{{$carts[$i]->getProduct->price * $carts[$i]->qty}}</td>
                        @php
                            $total_price += $carts[$i]->getProduct->price * $carts[$i]->qty;
                        @endphp
                        <td><a href="/deleteCart/{{$carts[$i]->product_id}}"><button>Delete</button></a></td>
                    </tr>
                @endfor
            </table>
        </div>
        <div>
            <p>Grand Total {{$total_price}}</p>
            <a href="/checkout"><button>Check Out</button></a>
        </div>

    </div>

@endsection
