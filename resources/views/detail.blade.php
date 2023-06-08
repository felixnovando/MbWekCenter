@extends('template')


@section('content')

    <div class="m-5">
        <div class="bg-slate-100 w-[500px] m-auto p-5 text-lg shadow-lg drop-shadow-lg rounded-lg">
            <img src="{{ \Illuminate\Support\Facades\URL::asset('storage/' . $product->image) }}"
                alt="{{ '/' . $product->image }}" class="object-cover p-2 m-auto">
            <p class="my-2 text-xl font-semibold text-center">{{ $product->title }}</p>
            <p class="my-2 text-justify">{{ $product->description }}</p>
            <div class="my-2">
                <span>Stock : </span>
                <span>{{ $product->stock }} pieces(s)</span>
            </div>
            <div class="my-2">
                <span>Price : </span>
                <span>Rp. {{ $product->price }}</span>
            </div>

            @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role == 'Customer')
                <form action="/addCart" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}" class="hidden">
                    <div class="my-2">
                        <label for="qty">Quantity : </label>
                        <input type="text" class="w-20 p-1 pl-2 rounded-md" name="qty" id="qty"
                            value="{{ $cart != null ? $cart->qty : 0 }}">
                    </div>
                    <div class="my-2">
                        @if ($errors->any())
                            <p class="font-semibold text-red-600">{{ $errors->all()[0] }}</p>
                        @endif
                    </div>
                    <div>
                        <button
                            class="w-full p-2 mt-2 font-semibold text-white bg-green-600 hover:text-green-600 hover:bg-white">Add
                            to Cart</button>
                    </div>
                </form>
            @endif
        </div>
    </div>





@endsection
