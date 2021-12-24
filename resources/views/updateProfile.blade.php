@extends('template')

@section('content')

    <div>
        <div>Update Profile</div>
        <form method="POST" action="/updateProfile">
            @method('PUT')
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
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
                <select name="gender" id="gender" onselect="{{\Illuminate\Support\Facades\Auth::user()->gender}}">
                    @if(\Illuminate\Support\Facades\Auth::user()->gender == "Male")
                        <option value="Male" selected>Male</option>
                        <option value="Female">Female</option>
                    @else
                        <option value="Male">Male</option>
                        <option value="Female" selected>Female</option>
                    @endif
                </select>
            </div>
            <div>
                @if($errors->any())
                    <p style="color: red">{{$errors->all()[0]}}</p>
                @endif
            </div>
            <div>
                <button>Submit</button>
            </div>
        </form>
    </div>

@endsection
