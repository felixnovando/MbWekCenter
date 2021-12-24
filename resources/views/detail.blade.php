@extends('template')


@section('content')

    <div>
        <div>
            <img class="img" src="{{\Illuminate\Support\Facades\URL::asset('storage/' . $product->image)}}" alt="{{'/' . $product->image}}">
        </div>
        <div>
            <p>{{$product->title}}</p>
            <p>Description : </p>
            <div>{{$product->description}}</div>
            <p>Stock : </p>
            <p>{{$product->stock}} pieces(s)</p>
            <p>Price : </p>
            <p>Rp. {{$product->price}}</p>

            @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role == "Customer")
                <form action="/addCart" method="POST">
                    @csrf
                    <h2>Add To Cart</h2>
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <div>
                        <label for="qty">Quantity : </label>
                        <input type="text" name="qty" id="qty" value="{{$cart != null ? $cart->qty : 0}}">
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
            @endif
        </div>
    </div>





@endsection
