@extends('template')

<style>
    .img {
        width: 300px;
        height: 300px;
        object-fit: cover;
    }

    #item-container>div>div>p {
        max-width: 300px;
    }
</style>

@section('content')
    <div id="item-container" class="flex flex-wrap items-center justify-center w-full">
        @foreach ($products as $product)
            <div class="p-5 m-5 shadow-lg bg-slate-100 drop-shadow-lg">
                <img class="img" src="{{ \Illuminate\Support\Facades\URL::asset('storage/' . $product->image) }}"
                    alt="{{ '/' . $product->image }}">
                <div class="my-2">
                    <p class="text-xl text-center">{{ $product->title }}</p>
                    <p class="mt-2 text-justify">{{ $product->description }}</p>
                    @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role == 'Admin')
                        <a href="/updateProduct/{{ $product->id }}"><button
                                class="w-full p-2 mt-2 font-semibold text-white bg-yellow-600 hover:text-yellow-600 hover:bg-white">Update
                                Product</button></a>
                    @endif
                    <a href="/detail/{{ $product->id }}"><button
                            class="w-full p-2 mt-2 font-semibold text-white bg-blue-600 hover:text-blue-600 hover:bg-white">Product
                            Detail</button></a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
