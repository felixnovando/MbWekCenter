@extends('template')

@section('content')
    <div class="bg-gray-400 w-[500px] m-auto p-5 rounded-xl my-16">
        <div class="text-2xl font-bold text-center">Update Profile</div>
        <form method="POST" action="/updateProfile" class="text-lg">
            @method('PUT')
            @csrf
            <div class="flex flex-col px-2 my-3">
                <label for="name" class="mb-2">Name</label>
                <input type="text" name="name" id="name" class="p-1 pl-2 rounded-md"
                    value="{{ \Illuminate\Support\Facades\Auth::user()->name }}">
            </div>
            <div class="flex flex-col px-2 my-3">
                <label for="password" class="mb-2">Password</label>
                <input type="password" name="password" id="password" class="p-1 pl-2 rounded-md">
            </div>
            <div class="flex flex-col px-2 my-3">
                <label for="confirm" class="mb-2">Confirm Password</label>
                <input type="password" name="confirm" id="confirm" class="p-1 pl-2 rounded-md">
            </div>
            <div class="flex flex-col px-2 my-3">
                <label for="gender" class="mb-2">Remember Me</label>
                <select name="gender" id="gender" onselect="{{ \Illuminate\Support\Facades\Auth::user()->gender }}"
                    class="p-1 pl-2 rounded-md">
                    @if (\Illuminate\Support\Facades\Auth::user()->gender == 'Male')
                        <option value="Male" selected>Male</option>
                        <option value="Female">Female</option>
                    @else
                        <option value="Male">Male</option>
                        <option value="Female" selected>Female</option>
                    @endif
                </select>
            </div>
            <div class="flex flex-col px-2 my-3">
                @if ($errors->any())
                    <p class="font-semibold text-red-600">{{ $errors->all()[0] }}</p>
                @endif
            </div>
            <div class="flex flex-col text-center">
                <button
                    class="p-2 font-semibold text-white bg-green-500 rounded-lg hover:bg-white hover:text-green-500">Submit</button>
            </div>
        </form>
    </div>
@endsection
