@extends('template')

<style>
    table,
    tr,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
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
                <th>User ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->gender }}</td>
                    <td><a href="/deleteUser/{{ $user->id }}"><button class="p-2 font-semibold text-white bg-red-500 rounded-lg hover:bg-white hover:text-red-500">Delete</button></a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
