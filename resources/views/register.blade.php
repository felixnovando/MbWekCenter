@extends('template')

@section('content')
    <div class="bg-gray-400 w-[500px] m-auto p-5 rounded-xl my-8">
        <div class="text-2xl font-bold text-center">Register</div>
        <form method="POST" action="/register" class="text-lg">
            @csrf
            <div class="flex flex-col px-2 my-3">
                <label for="name" class="mb-2">Name</label>
                <input class="p-1 pl-2 rounded-md" type="text" name="name" id="name">
            </div>
            <div class="flex flex-col px-2 my-3">
                <label for="email" class="mb-2">E-Mail Address</label>
                <input class="p-1 pl-2 rounded-md" type="text" name="email" id="email">
            </div>
            <div class="flex flex-col px-2 my-3">
                <label for="password" class="mb-2">Password</label>
                <input class="p-1 pl-2 rounded-md" type="password" name="password" id="password">
            </div>
            <div class="flex flex-col px-2 my-3">
                <label for="confirm" class="mb-2">Confirm Password</label>
                <input class="p-1 pl-2 rounded-md" type="password" name="confirm" id="confirm">
            </div>
            <div class="flex flex-col px-2 my-3">
                <label for="gender" class="mb-2">Remember Me</label>
                <select name="gender" id="gender" class="p-1 pl-2 rounded-md">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="px-2 my-3">
                @if ($errors->any())
                    <p class="font-semibold text-red-600">{{ $errors->all()[0] }}</p>
                @endif
            </div>
            <div>
                <button class="w-full p-2 font-semibold text-white bg-green-500 rounded-lg hover:bg-white hover:text-green-500">Register</button>
            </div>
        </form>
    </div>
@endsection
