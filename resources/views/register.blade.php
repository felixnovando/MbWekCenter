@extends('template')

@section('content')

    <div>
        <div>Register</div>
        <form method="POST" action="/register">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <label for="email">E-Mail Address</label>
                <input type="text" name="email" id="email">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <label for="confirm">Confirm Password</label>
                <input type="password" name="confirm" id="confirm">
            </div>
            <div>
                <label for="gender">Remember Me</label>
                <select name="gender" id="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div>
                @if($errors->any())
                    <p style="color: red">{{$errors->all()[0]}}</p>
                @endif
            </div>
            <div>
                <button>Register</button>
            </div>
        </form>
    </div>

@endsection
