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
            Transaction
        </div>
        <div>
            <table>
                <tr>
                    <th>No</th>
                    <th>Transaction Time</th>
                    <th>Detail Transaction</th>
                </tr>
                    @for($i=0; $i<count($transactions); $i++)
                    <tr>
                        <td>{{$i+1}}</td>
                        <td>{{$transactions[$i]->created_at}}</td>
                        <td><a href="/transactionDetail/{{$transactions[$i]->id}}"><button>Check Detail</button></a></td>
                    </tr>
                    @endfor
            </table>
        </div>
    </div>

@endsection
