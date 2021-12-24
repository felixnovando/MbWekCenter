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
            <table>
                <tr>
                    <th>User ID</th>
                    <th colspan="2">Username</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td><a href="/deleteUser/{{$user->id}}"><button>Delete</button></a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
