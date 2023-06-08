@extends('template')

@section('content')
    <div class="bg-gray-400 w-[500px] m-auto p-5 rounded-xl my-16">
        <div class="text-2xl font-bold text-center">Login</div>
        <form method="POST" action="" class="text-lg">
            @csrf
            <div class="flex flex-col px-2 my-3">
                <label for="email" class="mb-2">E-Mail Address</label>
                <input type="text" name="email" id="email" class="p-1 pl-2 rounded-md"
                    value="{{ \Illuminate\Support\Facades\Cookie::has('myCookie')
                        ? \Illuminate\Support\Facades\Cookie::get('myCookie')
                        : '' }}">
            </div>
            <div class="flex flex-col px-2 my-3">
                <label for="password" class="mb-2">Password</label>
                <input type="password" name="password" id="password" class="p-1 pl-2 rounded-md">
            </div>
            <div class="flex px-2 my-3">
                <input type="checkbox" name="remember" id="remember" class="w-5 mr-3">
                <label for="remember">Remember Me</label>
            </div>
            <div class="px-2 my-3">
                @if ($errors->any())
                    <p class="font-semibold text-red-600">{{ $errors->all()[0] }}</p>
                @endif
            </div>
            <div class="flex flex-col text-center">
                <button class="p-2 font-semibold text-white bg-green-500 rounded-lg hover:bg-white hover:text-green-500">Login</button>
                <p class="mt-2 text-blue-800 underline">Forgot Your Password ?</p>
            </div>
        </form>
    </div>
@endsection
