@extends('template')

@section('content')

    <div>
        <div>Login</div>
        <form method="POST" action="">
            @csrf
            <div>
                <label for="email">E-Mail Address</label>
                <input type="text" name="email" id="email" value="{{\Illuminate\Support\Facades\Cookie::has('myCookie') ?
                            \Illuminate\Support\Facades\Cookie::get('myCookie') : ""}}">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>
            </div>
            <div>
                @if($errors->any())
                    <p style="color: red">{{$errors->all()[0]}}</p>
                @endif
            </div>
            <div>
                <button>Login</button>
                <p>Forgot Your Password ?</p>
            </div>
        </form>
    </div>

@endsection
